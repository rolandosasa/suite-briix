<?php

namespace App\Repositories\Briix\Access\Contract;

use App\Models\Briix\Access\User\User;
use App\Models\Briix\Access\Contract\Contract;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Briix\Access\Contract\ContractCreated;
use App\Events\Briix\Access\Contract\ContractDeleted;
use App\Events\Briix\Access\Contract\ContractUpdated;
use App\Events\Briix\Access\Contract\ContractRestored;
use App\Events\Briix\Access\Contract\ContractPermanentlyDeleted;
use App\Exceptions\Briix\Access\User\UserNeedsRolesException;
use App\Exceptions\Briix\Access\User\UserNeedsPacketssException;
use App\Repositories\Briix\Access\Packet\PacketRepositoryContract;
use App\Repositories\Frontend\Access\User\UserRepositoryContract as FrontendUserRepositoryContract;

/**
 * Class EloquentContractRepository
 * @package app\Repositories\Contract
 */
class EloquentContractRepository implements ContractRepositoryContract
{
    /**
     * @var PlanRepositoryContract
     */
    protected $packet;

    /**
     * @var FrontendUserRepositoryContract
     */
    protected $user;

    /**
     * @param RoleRepositoryContract $role
     * @param PacketRepositoryContract $packet
     * @param FrontendUserRepositoryContract $user
     */
    public function __construct(PacketRepositoryContract $packet, FrontendUserRepositoryContract $user)
    {
        $this->packet = $packet;
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCount() {
        return Contract::count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */

    public function getForDataTable($trashed = false)
    {
        /**
         * Note: You must return deleted_at or the User getActionButtonsAttribute won't
         * be able to differentiate what buttons to show for each row.
         */
        if ($trashed == "true") {
            return Contract::onlyTrashed()
                ->select([ 'id', 'client_id', 'executive_id', 'quantity', 'typePay', 'rate_plan_id','payment_id','status', 'created_at', 'updated_at', 'deleted_at'])
                ->get();
        }

        

        return Contract::select([
            'contracts.id', 
            \DB::raw('users.name as client'),
            'contracts.client_id',
            'contracts.executive_id',
            'contracts.quantity',
            'contracts.typePay',
            \DB::raw('rate_plans.description as rate_plan'),
            'contracts.rate_plan_id', 
            'contracts.payment_id', 
            'contracts.status', 
            'contracts.created_at', 
            'contracts.updated_at', 
            'contracts.deleted_at'])
        ->join('users','users.id','=','contracts.client_id')
        ->join('rate_plans','rate_plans.id','=','contracts.rate_plan_id')
        ->get();

    }


    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllContracts($order_by = 'sort', $sort = 'asc', $withPermissions = false)
    {
        return Contract::orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input, $packets)
    {
        $user = User::find($input['client_id']);
        $contract = $this->createContractStub($input);
       // dd($packets);

        DB::transaction(function() use ($user, $contract, $packets) {
            if ($contract->save()) {

                //User Created, Validate Plans
                $this->validatePlanAmount($user, $packets['assignees_packets']);

                //Attach new plans
                $contract->attachPackets($packets['assignees_packets'], $user);
                
                event(new ContractCreated($contract));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.contracts.create_error'));
        });
    }


    /**
     * @param  Contract $contract
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(Contract $contract, $input, $plans)
    {
        $user = User::find($contract->client_id);
        
        DB::transaction(function() use ($user, $contract, $input, $plans) {
            if ($contract->update($input)) {
                //For whatever reason this just wont work in the above call, so a second is needed for now
                $contract->save();
                
                $this->checkUserPlansCount($plans);
                $this->flushPlans($plans, $user);

                event(new ContractUpdated($contract));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.contracts.update_error'));
        });
    }

    /**
     * @param  Contract $contract
     * @throws GeneralException
     * @return bool
     */
    public function destroy(Contract $contract)
    {
        if ($contract->delete()) {
            event(new ContractDeleted($contract));
            return true;
        }

        throw new GeneralException(trans('exceptions.Briix.access.contracts.delete_error'));
        
    }

    /**
     * @param  Contract $contract
     * @throws GeneralException
     * @return boolean|null
     */
    public function delete(Contract $contract)
    {
        //Failsafe
        if (is_null($contract->deleted_at)) {
            throw new GeneralException("This contract must be deleted first before it can be destroyed permanently.");
        }

        DB::transaction(function() use ($contract) {
            

            if ($contract->forceDelete()) {
                event(new ContractPermanentlyDeleted($contract));
                return true;
            }

            throw new GeneralException(trans('exceptions.Briix.access.contracts.delete_error'));
        });
    }


    /**
     * @param  Contract $contract
     * @throws GeneralException
     * @return bool
     */
    public function restore(Contract $contract)
    {
        //Failsafe
        if (is_null($contract->deleted_at)) {
            throw new GeneralException("This contract is not deleted so it can not be restored.");
        }

        if ($contract->restore()) {
            event(new ContractRestored($contract));
            return true;
        }

        throw new GeneralException(trans('exceptions.Briix.access.contracts.restore_error'));
    }

    /**
     * Check to make sure at lease one plan is being applied or deactivate user
     *
     * @param  $user
     * @param  $plans
     * @throws UserNeedsPlansException
     */
    private function validatePlanAmount($user, $plans)
    {
        //Validate that there's at least one plan chosen, placing this here so
        //at lease the user can be updated first, if this fails the roles will be
        //kept the same as before the user was updated
        if (count($plans) == 0) {
            //Deactivate user
            $user->status = 0;
            $user->save();
            dd($user);

            $exception = new UserNeedsPlansException();
            $exception->setValidationErrors(trans('exceptions.backend.access.users.plan_needed_create'));

            //Grab the user id in the controller
            $exception->setUserID($user->id);
            throw $exception;
        }
    }

    /**
     * @param $plans
     * @param $user
     */
    private function flushPlans($plans, $user)
    {
        //Flush plans out, then add array of new ones
        $user->detachPlans($user->plans);
        $user->attachPlans($plans['assignees_plans']);
    }

    /**
     * @param  $plans
     * @throws GeneralException
     */
    private function checkUserPlansCount($plans)
    {
        //User Updated, Update Plans
        //Validate that there's at least one plan chosen
        if (count($plans['assignees_plans']) == 0) {
            throw new GeneralException(trans('exceptions.backend.access.users.plan_needed'));
        }
    }

    /**
     * @return mixed
     */
    public function getDefaultUserRole() 
    {
        
    }

    /**
     * @param  $input
     * @return mixed
     */
    private function createContractStub($input)
    {
        $contract                   = new Contract;
        $contract->enterprise_id    = $input['enterprise_id'];
        $contract->client_id        = $input['client_id'];
        $contract->executive_id     = $input['executive_id'];
        $contract->quantity         = $input['quantity'];
        $contract->typePay          = $input['typePay'];
        $contract->rate_plan_id     = $input['rate_plan_id'];
        $contract->payment_id       = $input['payment_id'];
        $contract->estatus           = $input['status'];
        $contract->database           = $input['database'];
        $contract->save();
        return $contract;
    }
}
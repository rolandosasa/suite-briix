<?php

namespace App\Repositories\Briix\Access\Payment;

use App\Models\Briix\Access\Payment\Payment;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Events\Briix\Access\Payment\PaymentCreated;
use App\Events\Briix\Access\Payment\PaymentDeleted;
use App\Events\Briix\Access\Payment\PaymentUpdated;

/**
 * Class EloquentPaymentRepository
 * @package app\Repositories\Payment
 */
class EloquentPaymentRepository implements PaymentRepositoryContract
{
    
	/**
     * @return mixed
     */
    public function getCount() {
        return Payment::count();
    }

	/**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getForDataTable() {
        return Payment::all();
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllPayments($order_by = 'id')
    {
      
        return Payment::all();
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
		
    }

    /**
     * @param  Payment $Payment
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function update(Payment $Payment, $input)
    {
        
    }

    /**
     * @param  Payment $Payment
     * @throws GeneralException
     * @return bool
     */
    public function destroy(Payment $Payment)
    {
      
    }

	/**
	 * @return mixed
	 */
	public function getDefaultUserPayment() {
		
	}
}
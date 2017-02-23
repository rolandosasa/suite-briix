<?php

namespace App\Models\Briix\Access\Contract;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Briix\Access\Contract\Traits\ContractAccess;
use App\Models\Briix\Access\Contract\Traits\Attribute\ContractAttribute;
use App\Models\Briix\Access\Contract\Traits\Relationship\ContractRelationship;

/**
 * Class Contract
 * @package App\Models\Briix\Access\Contract
 */
class Contract extends Model
{
    use SoftDeletes, ContractAccess, ContractAttribute, ContractRelationship;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['enterprise_id','client_id', 'executive_id', 'quantity', 'typePay', 'rate_plan_id','payment_id','status','estatus','database'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.contracts_table');
    }
    
}

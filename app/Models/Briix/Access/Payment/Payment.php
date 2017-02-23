<?php


namespace App\Models\Briix\Access\Payment;

use Illuminate\Database\Eloquent\Model;
use App\Models\Briix\Access\Payment\Traits\Relationship\PaymentRelationship;

/**
 * Class Payment
 * @package App\Models\Briix\Access\Payment
 */

class Payment extends Model
{
    //
     use PaymentRelationship;

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
    protected $fillable = ['dateInit', 'dateEnd', 'period','amountPay','reference_id'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.payments_table');
    }
}

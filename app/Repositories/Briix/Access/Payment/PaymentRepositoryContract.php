<?php

namespace App\Repositories\Briix\Access\Payment;

use App\Models\Briix\Access\Payment\Payment;

/**
 * Interface PaymentRepositoryContract
 * @package app\Repositories\Payment
 */
interface PaymentRepositoryContract
{

	/**
     * @return mixed
     */
    public function getCount();

	/**
     * @return mixed
     */
    public function getForDataTable();

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllPayments($order_by = 'id');

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  Payment $Payment
     * @param  $input
     * @return mixed
     */
    public function update(Payment $payment, $input);

    /**
     * @param  Payment $Payment
     * @return mixed
     */
    public function destroy(Payment $payment);

	/**
     * @return mixed
     */
}
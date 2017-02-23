<?php

namespace App\Repositories\Crecursos\Access\Calendar;

use App\Models\Crecursos\Access\Calendar\Calendar;

/**
 * Interface CalendarRepositoryContract
 * @package app\Repositories\Calendar
 */
interface CalendarRepositoryContract
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
    public function getAllCalendar($order_by = 'id');

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  Calendar $Calendar
     * @param  $input
     * @return mixed
     */
    public function update(Calendar $Calendar, $input);

    /**
     * @param  Calendar $Calendar
     * @return mixed
     */
    public function destroy(Calendar $Calendar);

    /**
     * @return mixed
     */
    
}
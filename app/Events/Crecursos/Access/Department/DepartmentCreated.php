<?php

namespace App\Events\Crecursos\Access\Department;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class DepartmentCreated
 * @package App\Events\Crecursos\Access\Department
 */
class DepartmentCreated extends Event
{
	use SerializesModels;

	/**
	 * @var $Department
	 */
	public $department;

	/**
	 * @param $Department
	 */
	public function __construct($department)
	{
		$this->department = $department;
	}
}
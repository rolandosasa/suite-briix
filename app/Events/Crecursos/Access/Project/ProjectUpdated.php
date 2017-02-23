<?php

namespace App\Events\Crecursos\Access\Project;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProjectUpdated
 * @package App\Events\Crecursos\Access\Project
 */
class ProjectUpdated extends Event
{
	use SerializesModels;

	/**
	 * @var $Project
	 */
	public $project;

	/**
	 * @param $Project
	 */
	public function __construct($project)
	{
		$this->project = $project;
	}
}
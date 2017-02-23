<?php namespace App\Repositories\Crecursos\History;

use App\Models\Crecursos\History\History;

/**
 * Interface HistoryContract
 * @package App\Repositories\Crecursos\History
 */
interface HistoryContract {

	/**
	 * @param $type
	 * @param $text
	 * @param null $entity_id
	 * @param null $icon
	 * @param null $class
	 * @param null $assets
	 * @return mixed
	 */
	public function log($type, $text, $entity_id = null, $icon = null, $class = null,  $assets = null);

	/**
	 * @return mixed
	 */
	public function render();

	/**
	 * @param $type
	 * @return mixed
	 */
	public function renderType($type);

	/**
	 * @param $entity_id
	 * @return mixed
	 */
	public function renderEntity($entity_id);

	/**
	 * @param $text
	 * @param bool $assets
	 * @return mixed
	 */
	public function renderDescription($text, $assets = false);

	/**
	 * @param $items
	 * @return mixed
	 */
	public function buildList($items);

	/**
	 * @param History $history
	 * @return mixed
	 */
	public function buildItem(History $history);
}
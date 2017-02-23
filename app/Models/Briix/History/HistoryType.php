<?php namespace App\Models\Briix\History;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HistoryType
 * package App
 */
class HistoryType extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'history_types';
	
    protected $connection = 'briix';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];
}
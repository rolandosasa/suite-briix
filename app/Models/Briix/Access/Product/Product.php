<?php

namespace App\Models\Briix\Access\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Briix\Access\Product\Traits\Relationship\ProductRelationship;

/**
 * Class Permissionservice
 * @package App\Models\Access\Permissionservice
 */
class Product extends Model
{
    use ProductRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    protected $connection = 'briix';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'sort'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.products_table');
    }
}
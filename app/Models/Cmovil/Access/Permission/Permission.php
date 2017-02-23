<?php

namespace App\Models\Cmovil\Access\Permission;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cmovil\Access\Permission\Traits\Relationship\PermissionRelationship;

/**
 * Class Permission
 * @package App\Models\Access\Permission
 */
class Permission extends Model
{
    use PermissionRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    protected $connection = 'cmovil';
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
        $this->table = config('accessCM.permissions_table');
    }
}
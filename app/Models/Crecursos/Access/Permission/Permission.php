<?php

namespace App\Models\Crecursos\Access\Permission;

use Illuminate\Database\Eloquent\Model;
use App\Models\Crecursos\Access\Permission\Traits\Relationship\PermissionRelationship;

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

    protected $connection = 'cRecursos';

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
        $this->table = config('accessRH.permissions_table');
    }
}
<?php

namespace App\Models\Briix\Access\Role;

use Illuminate\Database\Eloquent\Model;
use App\Models\Briix\Access\Role\Traits\RoleAccess;
use App\Models\Briix\Access\Role\Traits\Attribute\RoleAttribute;
use App\Models\Briix\Access\Role\Traits\Relationship\RoleRelationship;

/**
 * Class Role
 * @package App\Models\Briix\Access\Role
 */
class Role extends Model
{
    use RoleAccess, RoleAttribute, RoleRelationship;

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
    protected $fillable = ['name', 'all', 'sort'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.roles_table');
    }
}

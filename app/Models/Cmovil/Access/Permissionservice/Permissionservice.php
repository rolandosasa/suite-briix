<?php

namespace App\Models\Cmovil\Access\Permissionservice;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cmovil\Access\Permissionservice\Traits\Relationship\PermissionserviceRelationship;

/**
 * Class Permissionservice
 * @package App\Models\Access\Permissionservice
 */
class Permissionservice extends Model
{
    use PermissionserviceRelationship;

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
        $this->table = config('accessCM.permissionservices_table');
    }
}
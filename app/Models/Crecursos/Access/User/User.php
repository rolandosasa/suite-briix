<?php

namespace App\Models\Crecursos\Access\User;

use App\Models\Crecursos\Access\User\Traits\UserAccess;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Crecursos\Access\User\Traits\Attribute\UserAttribute;
use App\Models\Crecursos\Access\User\Traits\Relationship\UserRelationship;

/**
 * Class User
 * @package App\Models\Access\User
 */
class User extends Authenticatable
{

    use SoftDeletes, UserAccess, UserAttribute, UserRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'status', 'confirmation_code', 'confirmed'];

    protected $connection = 'cRecursos';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
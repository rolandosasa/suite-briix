<?php

namespace App\Models\Briix\Access\User\Traits\Relationship;

use App\Models\Briix\Access\User\SocialLogin;

/**
 * Class UserRelationship
 * @package App\Models\Access\User\Traits\Relationship
 */
trait UserRelationship
{

    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('access.role'), config('access.assigned_roles_table'), 'user_id', 'role_id');
    }

    /**
     * Many-to-Many relations with Plan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    

    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialLogin::class);
    }

    public function enterprise()
    {
        return $this->belongsTo(config('access.enterprise'), 'enterprise_id');
    }

    public function client_contracts()
    {
        return $this->hasMany(config('access.contract'), 'client_id');
    }

    public function executive_contracts()
    {
        return $this->hasMany(config('access.enterprise'), 'executive_id');
    }

}
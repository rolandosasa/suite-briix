<?php

namespace App\Models\Cmovil\Access\User\Traits\Relationship;

use App\Models\Cmovil\Access\User\SocialLogin;

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
        return $this->belongsToMany(config('accessCM.role'), config('accessCM.assigned_roles_table'), 'user_id', 'role_id');
    }

    /**
     * Many-to-Many relations with Plan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function plans()
    {
        return $this->belongsToMany(config('accessCM.plan'), config('accessCM.assigned_plans_table'), 'user_id', 'plan_id');
    }

    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialLogin::class);
    }

    public function enterprise()
    {
        return $this->belongsTo(config('accessCM.enterprise'), 'enterprise_id');
    }

    public function client_contracts()
    {
        return $this->hasMany(config('accessCM.contract'), 'client_id');
    }

    public function executive_contracts()
    {
        return $this->hasMany(config('accessCM.enterprise'), 'executive_id');
    }

}
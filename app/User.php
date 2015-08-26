<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function users_groups()
    {
        return $this->hasMany(UserGroup::class);
    }

    public function scopeGetGroups()
    {
        $grps = array();
        $usergroups = $this->users_groups()->where('user_id', $this->id)->get();
        foreach ($usergroups as $key => $ug) {
            $grps[] = $ug->group;
        }
        return $grps;
    }

    // public function scopeAddGroup($query, $group)
    // {
    //     debug('group:', $query->where());
    // }
}

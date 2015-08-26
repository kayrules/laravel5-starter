<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    // protected $fillable = array('name');

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users_groups()
    {
        return $this->hasMany(UserGroup::class);
    }
}

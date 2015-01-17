<?php

namespace Fourtwenty\Cms;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends \Eloquent implements UserInterface, RemindableInterface
{

    use UserTrait,
        RemindableTrait,
        SoftDeletingTrait;

    protected $connection = 'fourtwenty.cms';
    protected $fillable = ['id'];
    protected $appends = ['full_name'];
    protected $hidden = ['password', 'remember_token'];

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

}

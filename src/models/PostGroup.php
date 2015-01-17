<?php

namespace Fourtwenty\Cms;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class PostGroup extends \Eloquent
{

    protected $connection = 'fourtwenty.cms';

    public function type()
    {
        return $this->belongsTo('Fourtwenty\Cms\PostGroupType', 'post_group_type_id');
    }

    public function posts()
    {
        return $this->hasMany('Fourtwenty\Cms\Post');
    }

}

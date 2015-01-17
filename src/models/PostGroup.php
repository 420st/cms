<?php

class PostGroup extends Eloquent
{

    public function type()
    {
        return $this->belongsTo('PostGroupType', 'post_group_type_id');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

}

<?php

namespace Fourtwenty\Cms;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Attachment extends \Eloquent
{

    use SoftDeletingTrait;

    protected $connection = 'fourtwenty.cms';
    protected $fillable = ['id'];
    protected $appends = ['full_path'];

    public function post()
    {
        return $this->morphedByMany('Fourtwenty\Cms\Post', 'attachable');
    }

    public function getFullPathAttribute()
    {
        return url('uploads/' . $this->attributes['path'] . $this->attributes['name']);
    }

}

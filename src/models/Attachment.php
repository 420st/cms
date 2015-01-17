<?php

namespace Fourtwenty\Cms;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Attachment extends \Eloquent
{

    use SoftDeletingTrait;

    protected $connection = 'fourtwenty.cms';
    protected $fillable = ['id'];

    public function post()
    {
        return $this->morphedByMany('Fourtwenty\Cms\Post', 'attachable');
    }

}

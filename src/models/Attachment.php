<?php

class Attachment extends Eloquent
{

    use SoftDeletingTrait;

    protected $fillable = ['id'];

    public function post()
    {
        return $this->morphedByMany('Post', 'attachable');
    }

}

<?php

namespace Fourtwenty\Cms;

class PostGroupType extends \Eloquent
{

    protected $connection = 'fourtwenty.cms';
    public $timestamps = false;
    protected $appends = ['display_name', 'display_collective_name'];

    public function getDisplayNameAttribute()
    {
        $display_name = $this->attributes['name'];

        switch (strtolower($this->attributes['name'])) {
            case 'faq':
                $display_name = 'question';
                break;
            case 'news':
                $display_name = 'news item';
                break;
        }

        return ucwords($display_name);
    }

    public function getDisplayCollectiveNameAttribute()
    {
        $display_name = str_plural($this->attributes['name']);

        switch (strtolower($this->attributes['name'])) {
            case 'faq':
                $display_name = 'faq';
                break;
        }

        return ucwords($display_name);
    }

}

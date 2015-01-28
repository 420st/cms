<?php

namespace Fourtwenty\Cms;

class Subscriber extends \Eloquent
{

    protected $connection = 'fourtwenty.cms';
    protected $fillable = ['id'];

    public function getByPage($page = 1, $limit = 10)
    {

        $results = new \StdClass();
        $results->page = $page;
        $results->limit = $limit;
        $results->totalItems = 0;
        $results->items = array();

        $allSubscribers = $this;

        $results->totalItems = $allSubscribers->count();

        $subscribers = $allSubscribers
                ->skip($limit * ($page - 1))->take($limit)
                ->orderBy('created_at', 'desc')
                ->get(array('subscribers.*'));

        $results->items = $subscribers->all();

        return $results;
    }

}

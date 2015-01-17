<?php

class ProductCategory extends Eloquent
{

    protected $fillable = ['id'];
    protected $appends = [''];

    public function getByPage($page = 1, $limit = 10)
    {

        $results = new StdClass();
        $results->page = $page;
        $results->limit = $limit;
        $results->totalItems = 0;
        $results->items = array();

        $allPosts = $this;

        $results->totalItems = $allPosts->count();

        $posts = $allPosts
                ->skip($limit * ($page - 1))->take($limit)
                ->get(array('product_categories.*'));

        $results->items = $posts->all();

        return $results;
    }

}

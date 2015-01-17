<?php

namespace Fourtwenty\Cms;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Product extends \Eloquent
{

    use SoftDeletingTrait;

    protected $connection = 'fourtwenty.cms';
    protected $fillable = ['id'];
    protected $appends = [];

    public function category()
    {
        return $this->belongsTo('Fourtwenty\Cms\ProductCategory', 'product_category_id')->withTrashed();
    }

    public function attachments()
    {
        return $this->morphToMany('Fourtwenty\Cms\Attachment', 'attachable');
    }

    public function getByPage($page = 1, $limit = 10)
    {

        $results = new \StdClass();
        $results->page = $page;
        $results->limit = $limit;
        $results->totalItems = 0;
        $results->items = array();

        $allPosts = $this;

        $results->totalItems = $allPosts->count();

        $posts = $allPosts
                ->skip($limit * ($page - 1))->take($limit)
                ->get(array('products.*'));

        $results->items = $posts->all();

        return $results;
    }

}

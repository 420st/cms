<?php

namespace Fourtwenty\Cms;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Product extends \Eloquent
{

    use SoftDeletingTrait;

    protected $connection = 'fourtwenty.cms';
    protected $fillable = ['id'];
    protected $appends = ['slug', 'discount', 'image'];

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
                ->with('attachments')
                ->get(array('products.*'));

        $results->items = $posts->all();

        return $results;
    }

    public function getDiscountAttribute()
    {
        return ($this->marked_price > 0) ? round(100 - ($this->selling_price / $this->marked_price * 100), 0) : 0;
    }

    public function getImageAttribute()
    {
        if ($this->attachments->count()) {
            return $this->attachments->first();
        }
    }

    public function getSlugAttribute()
    {
        return \Str::slug($this->name);
    }

}

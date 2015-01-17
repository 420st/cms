<?php

namespace Fourtwenty\Cms;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends \Eloquent
{

    use SoftDeletingTrait;

    protected $connection = 'fourtwenty.cms';
    protected $fillable = ['id'];
    protected $appends = ['image_full_path', 'month_name'];

    public function group()
    {
        return $this->belongsTo('Fourtwenty\Cms\PostGroup');
    }

    public function category()
    {
        return $this->belongsTo('Fourtwenty\Cms\PostCategory');
    }

    public function attachments()
    {
        return $this->morphToMany('Fourtwenty\Cms\Attachment', 'attachable');
    }

    public function getByPage($page = 1, $limit = 10, $post_group_id)
    {

        $results = new \StdClass();
        $results->page = $page;
        $results->limit = $limit;
        $results->totalItems = 0;
        $results->items = array();

        $allPosts = $this->where('post_group_id', '=', $post_group_id);

        $results->totalItems = $allPosts->count();

        $posts = $allPosts
                ->skip($limit * ($page - 1))->take($limit)
                ->get(array('posts.*'));

        $results->items = $posts->all();

        return $results;
    }

    public function editions()
    {
        $editions = Post::distinct()
                ->select('date', \DB::raw('MONTH(date) as month'), \DB::raw('year(date) as year'))
                ->groupBy('month', 'year')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->get();

        return $editions;
    }

    public function getImageFullPathAttribute()
    {
        return url('images/blog/' . $this->attributes['image']);
    }

    public function getMonthNameAttribute()
    {
        return date('M', strtotime($this->attributes['date']));
    }

}

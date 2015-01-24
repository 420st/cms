<?php

namespace Fourtwenty\Cms;

use Redirect,
    View,
    Validator,
    Session,
    Input;

class PostController extends BaseController
{

    protected $perPage = 8;

    public function __construct()
    {
        parent::__construct();
        View::share('postgroups', PostGroup::all());
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($post_group_id = 0)
    {

        $page = Input::get('page', 1);

        $post = new Post();
        $paginatedPosts = $post->getByPage($page, $this->perPage, $post_group_id);

        $posts = \Paginator::make($paginatedPosts->items, $paginatedPosts->totalItems, $paginatedPosts->limit);

        $post_group = PostGroup::find($post_group_id);

        View::share('postgroup', $post_group);
        $this->layout->content = View::make('cms::post.index', array('postgroup' => $post_group, 'posts' => $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($post_group_id = 0)
    {

        $categories = [];
        foreach (PostCategory::get() as $cat) {
            $categories[$cat->id] = $cat->name;
        }

        $post_group = PostGroup::find($post_group_id);

        View::share('postgroup', $post_group);
        $this->layout->content = View::make('cms::post.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($post_group_id = 0)
    {
        $rules = array(
            'title' => 'required',
            'content' => 'required',
//            'image' => 'required|image|max:2000',
        );

        $post_group = PostGroup::find($post_group_id);

        if ($post_group->type->name != 'faq') {
            $rules['url'] = 'required';
            $rules['date'] = 'required|date';
        }

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route($this->config['path'] . '.pg.post.create', $post_group_id)
                            ->withErrors($validator)
                            ->withInput();
        } else {


            $post = new Post();
            $post->title = Input::get('title');
            $post->url = Input::get('url', '');
            $post->post_category_id = Input::get('category_id', 0);
            $post->post_group_id = $post_group_id;
            $post->content = Input::get('content');
            $post->date = gmdate('Y-m-d', strtotime(Input::get('date')));
            $post->save();

//            if (Input::hasFile('image')) {
//                $post->image = md5($post->id) . '.' . Input::file('image')->getClientOriginalExtension();
//                if (Input::file('image')->move(public_path('images/blog/'), $post->image)) {
//                    $post->save();
//                }
//            }
//
            // upload attachments
            $attachments = new AttachmentController;
            $errors = $attachments->upload($post);

            if ($errors) {
                Session::flash('errors', $errors);
            }

            Session::flash('success', 'Successfully created post!');

            return Redirect::route($this->config['path'] . '.pg.post.index', $post_group_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $post_id
     * @return Response
     */
    public function edit($post_group_id = 0, $post_id)
    {
        $post = Post::find($post_id);

        $categories = [];
        foreach (PostCategory::get() as $cat) {
            $categories[$cat->id] = $cat->name;
        }

        $post_group = PostGroup::find($post_group_id);

        View::share('postgroup', $post_group);
        $this->layout->content = View::make('cms::post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $post_id
     * @return Response
     */
    public function update($post_group_id = 0, $post_id)
    {
        $rules = array(
            'title' => 'required',
            'content' => 'required',
//            'image' => 'image|max:2000',
        );

        $post_group = PostGroup::find($post_group_id);

        if ($post_group->type->name != 'faq') {
            $rules['date'] = 'required|date';
            $rules['url'] = 'required';
        }

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route($this->config['path'] . '.pg.post.edit', [$post_group_id, $post_id])
                            ->withErrors($validator)
                            ->withInput();
        } else {

            $post = Post::find($post_id);
            $post->title = Input::get('title');
            $post->url = Input::get('url');
            $post->post_category_id = Input::get('category_id');
            $post->content = Input::get('content');
            $post->date = gmdate('Y-m-d', strtotime(Input::get('date')));

//            if (Input::hasFile('image')) {
//                $new_image_name = md5($post->id) . '.' . Input::file('image')->getClientOriginalExtension();
//                if (Input::file('image')->move(public_path('images/blog/'), $new_image_name)) {
//                    // remove old file
//                    if ($post->image != $new_image_name) {
//                        unlink(public_path('images/blog/') . $post->image);
//                    }
//
//                    $post->image = $new_image_name;
//                }
//            }

            $post->save();

            // upload attachments
            $attachments = new AttachmentController;
            $errors = $attachments->upload($post);

            if ($errors) {
                Session::flash('errors', $errors);
            }

            Session::flash('success', 'Successfully updated post!');

            return Redirect::route($this->config['path'] . '.pg.post.index', $post_group_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $post_id
     * @return Response
     */
    public function destroy($post_group_id = 0, $post_id)
    {
        Post::find($post_id)->delete();

        Session::flash('success', 'Successfully deleted the post!');

        return Redirect::route($this->config['path'] . '.pg.post.index', $post_group_id);
    }

}

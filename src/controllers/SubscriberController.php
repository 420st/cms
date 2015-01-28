<?php

namespace Fourtwenty\Cms;

use Redirect,
    View,
    Validator,
    Session,
    Input;

class SubscriberController extends BaseController
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
    public function index()
    {
        $page = Input::get('page', 1);

        $subscriber = new Subscriber();
        $paginatedSubscribers = $subscriber->getByPage($page, $this->perPage);

        $subscribers = \Paginator::make($paginatedSubscribers->items, $paginatedSubscribers->totalItems, $paginatedSubscribers->limit);

        $this->layout->content = View::make('cms::subscriber.index', array('subscribers' => $subscribers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

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
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}

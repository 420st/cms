<?php

namespace Fourtwenty\Cms;

use Config,
    View;

class BaseController extends \Controller
{

    protected $layout = 'cms::layouts.default';
    protected $sidebar = 'cms::layouts.sidebars.cms';
    protected $config = [];
    public $status;
    public $msg;
    public $data;

    public function __construct()
    {
        $this->config = Config::get('cms::config');
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
            $this->layout->sidebar = (isset($this->sidebar)) ? View::make($this->sidebar) : null;
        }

        View::share('site_name', $this->config['site_name']);
        View::share('path', $this->config['path']);
    }

    public function JSONRespond()
    {
        return Response::json(array(
                    'status' => $this->status,
                    'msg' => $this->msg,
                    'data' => $this->data
        ));
    }

}

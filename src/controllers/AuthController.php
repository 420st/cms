<?php

namespace Fourtwenty\Cms;

use Redirect,
    Auth,
    View,
    Validator,
    Input;

/**
 * Description of AuthController
 *
 * @author Malitta Nanayakkara <malitta@thinkcube.com>
 */
class AuthController extends BaseController
{

    protected $layout = 'cms::layouts.guest';

    public function getLogin()
    {
        if (Auth::check()) {
            return Redirect::route($this->config['cms_path'])->with('success', 'You are already logged in');
        }

        $this->layout->content = View::make('cms::user.login');
    }

    public function postLogin()
    {
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        // declare the rules for the form validation
        $rules = array(
            'username' => 'required',
            'password' => 'required'
        );

        // validate the inputs
        $validator = Validator::make($userdata, $rules);

        // check if the form validates with success.
        if ($validator->passes()) {

            if (Auth::attempt($userdata)) {
                return Redirect::intended($this->config['cms_path']); //->with('success', 'You have logged in successfully');
            } else {
                return Redirect::route($this->config['cms_path'] . '.login')->withErrors(array('password' => 'Password invalid'))->withInput(Input::except('password'));
            }
        }

        return Redirect::route($this->config['cms_path'] . '.login')->withErrors($validator)->withInput(Input::except('password'));
    }

    public function getLogout()
    {
        Auth::logout();

        // Redirect to homepage
        return Redirect::route($this->config['cms_path'] . '.login')->with('success', 'You have been successfully logged out');
    }

}

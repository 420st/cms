<?php

/**
 * Module specific configurations (only for module related routes)
 * Eg: To override the auth model used inside this package
 */
Route::filter('cmsconf', function() {
    // use different model for auth
    $this->app['config']['auth'] = array_merge(
            $this->app['config']['auth'], Config::get('cms::auth')
    );
});

/**
 * Seperate authentication filter for the package
 */
Route::filter('cmsauth', function() {
    if (Auth::guest()) {
        if (Request::ajax()) {
            return Response::make('Unauthorized', 401);
        } else {
            return Redirect::route(Config::get('cms::config.path') . '.login');
        }
    }
});

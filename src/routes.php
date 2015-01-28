<?php

$config = Config::get('cms::config');

Route::group(['prefix' => $config['path'], 'namespace' => 'Fourtwenty\Cms', 'before' => 'cmsconf'], function() use ($config) {

    // secure area
    Route::group(array('before' => 'cmsauth'), function() use ($config) {

        Route::get('/', ['uses' => function() use ($config) {
        return Redirect::route($config['path'] . '.pg.index');
    }, 'as' => $config['path'] . '.home']);

        Route::group(['prefix' => 'product'], function() use ($config) {
            Route::get('category/delete/{id}', array('uses' => 'ProductCategoryController@destroy', 'as' => $config['path'] . '.product.category.delete'));
            Route::resource('category', 'ProductCategoryController');
        });

        Route::resource('subscriber', 'SubscriberController');

        Route::get('product/delete/{id}', array('uses' => 'ProductController@destroy', 'as' => $config['path'] . '.product.delete'));
        Route::resource('product', 'ProductController');

        Route::resource('pg', 'PostGroupController');

        Route::get('pg/{pgid}/post/delete/{id}', array('uses' => 'PostController@destroy', 'as' => $config['path'] . '.pg.post.delete'));
        Route::resource('pg.post', 'PostController');

        Route::get('attachment/delete/{id}', array('uses' => 'AttachmentController@destroy', 'as' => $config['path'] . '.attachment.delete'));
    });

    Route::get('login', ['uses' => 'AuthController@getLogin', 'as' => $config['path'] . '.login']);
    Route::post('login', ['uses' => 'AuthController@postLogin', 'as' => $config['path'] . '.postlogin']);
    Route::get('logout', ['uses' => 'AuthController@getLogout', 'as' => $config['path'] . '.logout']);
});

<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('news', [
    'as' => 'news',
    'uses' => 'Foostart\News\Controllers\Front\NewsFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/news', [
            'as' => 'admin_news',
            'uses' => 'Foostart\News\Controllers\Admin\NewsAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/news/edit', [
            'as' => 'admin_news.edit',
            'uses' => 'Foostart\News\Controllers\Admin\NewsAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/news/edit', [
            'as' => 'admin_news.post',
            'uses' => 'Foostart\News\Controllers\Admin\NewsAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/news/delete', [
            'as' => 'admin_news.delete',
            'uses' => 'Foostart\News\Controllers\Admin\NewsAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////




        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
         Route::get('admin/news_category', [
            'as' => 'admin_news_category',
            'uses' => 'Foostart\News\Controllers\Admin\NewsCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/news_category/edit', [
            'as' => 'admin_news_category.edit',
            'uses' => 'Foostart\News\Controllers\Admin\NewsCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/news_category/edit', [
            'as' => 'admin_news_category.post',
            'uses' => 'Foostart\News\Controllers\Admin\NewsCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/news_category/delete', [
            'as' => 'admin_news_category.delete',
            'uses' => 'Foostart\News\Controllers\Admin\NewsCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});

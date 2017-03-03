<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('sample', [
    'as' => 'sample',
    'uses' => 'Foostart\Sample\Controllers\Front\SampleFrontController@index'
]);

Route::get('banner', [
    'as' => 'banner',
    'uses' => 'Foostart\Sample\Controllers\Front\SampleFrontController@banner'
]);

Route::get('detail', [
    'as' => 'detail',
    'uses' => 'Foostart\Sample\Controllers\Front\SampleFrontController@detail'
]);
/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        /**
         * list
         */
        Route::get('admin/sample', [
            'as' => 'admin_sample',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/sample/edit', [
            'as' => 'admin_sample.edit',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/sample/edit', [
            'as' => 'admin_sample.post',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/sample/delete', [
            'as' => 'admin_sample.delete',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@delete'
        ]);
        /* -----------banner---------- */
        Route::get('admin/banner', [
            'as' => 'admin_banner',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@banner'
        ]);
        Route::get('admin/banner/edit', [
            'as' => 'admin_banner.edit',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@edit1'
        ]);

        /**
         * post
         */
        Route::post('admin/banner/edit', [
            'as' => 'admin_banner.post',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@post1'
        ]);

        /**
         * delete
         */
        Route::get('admin/banner/delete', [
            'as' => 'admin_banner.delete',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@delete1'
        ]);
        /*-------------------detail-----------------*/
         Route::get('admin/detail', [
            'as' => 'admin_detail',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@detail'
        ]);
        Route::get('admin/detail/edit', [
            'as' => 'admin_detail.edit',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@edit_detail'
        ]);

        /**
         * post
         */
        Route::post('admin/detail/edit', [
            'as' => 'admin_detail.post',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@post_detail'
        ]);

        /**
         * delete
         */
        Route::get('admin/detail/delete', [
            'as' => 'admin_detail.delete',
            'uses' => 'Foostart\Sample\Controllers\Admin\SampleAdminController@delete_detail'
        ]);
    });
});

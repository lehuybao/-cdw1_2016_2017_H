<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('work', [
    'as' => 'work',
    'uses' => 'Foostart\Work\Controllers\Front\WorkFrontController@index'
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
        Route::get('admin/work', [
            'as' => 'admin_work',
            'uses' => 'Foostart\Work\Controllers\Admin\WorkAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/work/edit', [
            'as' => 'admin_work.edit',
            'uses' => 'Foostart\Work\Controllers\Admin\WorkAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/work/edit', [
            'as' => 'admin_work.post',
            'uses' => 'Foostart\Work\Controllers\Admin\WorkAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/work/delete', [
            'as' => 'admin_work.delete',
            'uses' => 'Foostart\Work\Controllers\Admin\WorkAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////




        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});

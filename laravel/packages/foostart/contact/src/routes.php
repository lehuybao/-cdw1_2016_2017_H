<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('contact', [
    'as' => 'contact',
    'uses' => 'Foostart\Contact\Controllers\Front\ContactFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CONTACT ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/contact', [
            'as' => 'admin_contact',
            'uses' => 'Foostart\Contact\Controllers\Admin\ContactAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/contact/edit', [
            'as' => 'admin_contact.edit',
            'uses' => 'Foostart\Contact\Controllers\Admin\ContactAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/contact/edit', [
            'as' => 'admin_contact.post',
            'uses' => 'Foostart\Contact\Controllers\Admin\ContactAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/contact/delete', [
            'as' => 'admin_contact.delete',
            'uses' => 'Foostart\Contact\Controllers\Admin\ContactAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CONTACT ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////




        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
         Route::get('admin/contact_category', [
            'as' => 'admin_contact_category',
            'uses' => 'Foostart\Contact\Controllers\Admin\ContactCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/contact_category/edit', [
            'as' => 'admin_contact_category.edit',
            'uses' => 'Foostart\Contact\Controllers\Admin\ContactCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/contact_category/edit', [
            'as' => 'admin_contact_category.post',
            'uses' => 'Foostart\Contact\Controllers\Admin\ContactCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/contact_category/delete', [
            'as' => 'admin_contact_category.delete',
            'uses' => 'Foostart\Contact\Controllers\Admin\ContactCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});

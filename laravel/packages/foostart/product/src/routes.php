<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('product', [
    'as' => 'product',
    'uses' => 'Foostart\Product\Controllers\Front\ProductFrontController@index'
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
        Route::get('admin/product', [
            'as' => 'admin_product',
            'uses' => 'Foostart\Product\Controllers\Admin\ProductAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/product/edit', [
            'as' => 'admin_product.edit',
            'uses' => 'Foostart\Product\Controllers\Admin\ProductAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/product/edit', [
            'as' => 'admin_product.post',
            'uses' => 'Foostart\Product\Controllers\Admin\ProductAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/product/delete', [
            'as' => 'admin_product.delete',
            'uses' => 'Foostart\Product\Controllers\Admin\ProductAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////




        
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
         Route::get('admin/product_category', [
            'as' => 'admin_product_category',
            'uses' => 'Foostart\Product\Controllers\Admin\ProductCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/product_category/edit', [
            'as' => 'admin_product_category.edit',
            'uses' => 'Foostart\Product\Controllers\Admin\ProductCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/product_category/edit', [
            'as' => 'admin_product_category.post',
            'uses' => 'Foostart\Product\Controllers\Admin\ProductCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/product_category/delete', [
            'as' => 'admin_product_category.delete',
            'uses' => 'Foostart\Product\Controllers\Admin\ProductCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});

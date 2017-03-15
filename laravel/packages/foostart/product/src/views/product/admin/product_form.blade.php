@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
    Admin area: {{ trans('product::product_admin.page_list') }}
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin"><i class="fa fa-group"></i> {!! 'Product' !!}</h3>
                </div>
                <div class="panel-body">
                    Admin Product
               </div>
           </div>
        </div>
        <div class="col-md-4">
            @include('product::product.admin.product_search')
        </div>
    </div>
</div>
@stop
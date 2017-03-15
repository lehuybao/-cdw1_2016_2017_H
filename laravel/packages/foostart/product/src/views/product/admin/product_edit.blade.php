@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: {{ trans('product::product_admin.page_edit') }}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">

            <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! !empty($product->product_id) ? '<i class="fa fa-pencil"></i>'.trans('product::product_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('product::product_admin.form_add') !!}
                    </h3>
                </div>

                {{-- model general errors from the form --}}
                @if($errors->has('product_name') )
                    <div class="alert alert-danger">{!! $errors->first('product_name') !!}</div>
                @endif

                @if($errors->has('name_unvalid_length') )
                    <div class="alert alert-danger">{!! $errors->first('name_unvalid_length') !!}</div>
                @endif

                {{-- successful message --}}
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success">{{$message}}</div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h4>{!! trans('product::product_admin.form_heading') !!}</h4>
                            {!! Form::open(['route'=>['admin_product.post', 'id' => @$product->product_id],  'files'=>true, 'method' => 'post'])  !!}


                            <!-- SAMPLE NAME TEXT-->
                            @include('product::product.elements.text', ['name' => 'product_name'])
                            <!-- /END SAMPLE NAME TEXT -->
                            {!! Form::hidden('id',@$product->product_id) !!}

                            <!-- DELETE BUTTON -->
                            <a href="{!! URL::route('admin_product.delete',['id' => @$product->id, '_token' => csrf_token()]) !!}"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                Delete
                            </a>
                            <!-- DELETE BUTTON -->

                            <!-- SAVE BUTTON -->
                            {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
                            <!-- /SAVE BUTTON -->

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
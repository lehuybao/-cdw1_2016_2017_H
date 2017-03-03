@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: {{ trans('sample::banner_admin.page_edit') }}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! !empty($banner->banner_id) ? '<i class="fa fa-pencil"></i>'.trans('sample::banner_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('sample::banner_admin.form_add') !!}
                    </h3>
                </div>

                {{-- model general errors from the form --}}
                @if($errors->has('banner_img') )
                    <div class="alert alert-danger">{!! $errors->first('banner_img') !!}</div>
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
                            <h4>{!! trans('sample::banner_admin.form_heading') !!}</h4>
                            {!! Form::open(['route'=>['admin_banner.post', 'id' => @$banner->banner_id],  'files'=>true, 'method' => 'post'])  !!}


                            <!-- SAMPLE NAME -->
                            <div class="form-group">
                                <?php $banner_img = $request->get('banner_img')?$request->get('banner_img'):@$banner->banner_img ?>
                                {!! Form::label('banner_img', trans('sample::banner_admin.name').':') !!}
                                {!! Form::text('banner_img', $banner_img, ['class' => 'form-control', 'placeholder' => trans('sample::banner_admin.name').'']) !!}
                            </div>
                            <!-- /SAMPLE NAME -->



                            {!! Form::hidden('id',@$banner->banner_id) !!}


                            <!-- DELETE BUTTON -->
                            <a href="{!! URL::route('admin_banner.delete',['id' => @$banner->id, '_token' => csrf_token()]) !!}"
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

        <div class='col-md-4'>
            @include('sample::sample.admin.banner.banner_search')
        </div>

    </div>
</div>
@stop
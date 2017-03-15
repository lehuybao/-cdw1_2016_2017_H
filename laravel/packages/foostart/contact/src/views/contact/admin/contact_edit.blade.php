@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: {{ trans('contact::contact_admin.page_edit') }}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">

            <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! !empty($contact->contact_id) ? '<i class="fa fa-pencil"></i>'.trans('contact::contact_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('contact::contact_admin.form_add') !!}
                    </h3>
                </div>

                {{-- model general errors from the form --}}
                @if($errors->has('contact_name') )
                    <div class="alert alert-danger">{!! $errors->first('contact_name') !!}</div>
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
                            <h4>{!! trans('contact::contact_admin.form_heading') !!}</h4>
                            {!! Form::open(['route'=>['admin_contact.post', 'id' => @$contact->contact_id],  'files'=>true, 'method' => 'post'])  !!}


                            <!-- SAMPLE NAME TEXT-->
                            @include('contact::contact.elements.text', ['name' => 'contact_name'])
                            <!-- /END SAMPLE NAME TEXT -->
                            {!! Form::hidden('id',@$contact->contact_id) !!}

                            <!-- DELETE BUTTON -->
                            <a href="{!! URL::route('admin_contact.delete',['id' => @$contact->id, '_token' => csrf_token()]) !!}"
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
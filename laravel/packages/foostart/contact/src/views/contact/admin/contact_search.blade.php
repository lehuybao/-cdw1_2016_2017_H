
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('contact::contact_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_contact','method' => 'get']) !!}

        <!--TITLE-->
        <div class="form-group">
            {!! Form::label('contact_name', trans('contact::contact_admin.contact_name_label')) !!}
            {!! Form::text('contact_name', @$params['contact_name'], ['class' => 'form-control', 'placeholder' => trans('contact::contact_admin.contact_name_placeholder')]) !!}
        </div>
        <!--/END TITLE-->

        {!! Form::submit(trans('contact::contact_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>



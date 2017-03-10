
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('work::work_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_work_category','method' => 'get']) !!}

        <!--TITLE-->
		<div class="form-group">
            {!! Form::label('work_category_name',trans('work::work_admin.work_category_name_label')) !!}
            {!! Form::text('work_category_name', @$params['work_category_name'], ['class' => 'form-control', 'placeholder' => trans('work::work_admin.work_category_name')]) !!}
        </div>

        {!! Form::submit(trans('work::work_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>





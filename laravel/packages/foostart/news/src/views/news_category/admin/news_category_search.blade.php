
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('news::news_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_news_category','method' => 'get']) !!}

        <!--TITLE-->
		<div class="form-group">
            {!! Form::label('news_category_name',trans('news::news_admin.news_category_name_label')) !!}
            {!! Form::text('news_category_name', @$params['news_category_name'], ['class' => 'form-control', 'placeholder' => trans('news::news_admin.news_category_name')]) !!}
        </div>

        {!! Form::submit(trans('news::news_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>





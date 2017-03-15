
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('product::product_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_product','method' => 'get']) !!}

        <!--TITLE-->
        <div class="form-group">
            {!! Form::label('product_name', trans('product::product_admin.product_name_label')) !!}
            {!! Form::text('product_name', @$params['product_name'], ['class' => 'form-control', 'placeholder' => trans('product::product_admin.product_name_placeholder')]) !!}
        </div>
        <!--/END TITLE-->

        {!! Form::submit(trans('product::product_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>



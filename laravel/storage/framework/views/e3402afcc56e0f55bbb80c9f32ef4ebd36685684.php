<?php $__env->startSection('title'); ?>
Admin area: <?php echo e(trans('sample::detail_admin.page_edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        <?php echo !empty($detail->detail_id) ? '<i class="fa fa-pencil"></i>'.trans('sample::detail_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('sample::detail_admin.form_add'); ?>

                        <?php echo !empty($detail->detail_code) ? '<i class="fa fa-pencil"></i>'.trans('sample::detail_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('sample::detail_admin.form_add'); ?>

                        <?php echo !empty($detail->detail_img) ? '<i class="fa fa-pencil"></i>'.trans('sample::detail_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('sample::detail_admin.form_add'); ?>

                        <?php echo !empty($detail->detail_desription) ? '<i class="fa fa-pencil"></i>'.trans('sample::detail_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('sample::detail_admin.form_add'); ?>

                    </h3>
                </div>

                
                <?php if($errors->has('detail_code') ): ?>
                <div class="alert alert-danger"><?php echo $errors->first('detail_code'); ?></div>
                <?php endif; ?>
                <?php if($errors->has('detail_img') ): ?>
                <div class="alert alert-danger"><?php echo $errors->first('detail_img'); ?></div>
                <?php endif; ?> <?php if($errors->has('detail_desription') ): ?>
                <div class="alert alert-danger"><?php echo $errors->first('detail_desription'); ?></div>
                <?php endif; ?>
                <?php if($errors->has('name_unvalid_length') ): ?>
                <div class="alert alert-danger"><?php echo $errors->first('name_unvalid_length'); ?></div>
                <?php endif; ?>

                
                <?php $message = Session::get('message'); ?>
                <?php if( isset($message) ): ?>
                <div class="alert alert-success"><?php echo e($message); ?></div>
                <?php endif; ?>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h4><?php echo trans('sample::detail_admin.form_heading'); ?></h4>
                            <?php echo Form::open(['route'=>['admin_detail.post', 'id' => @$detail->detail_id],  'files'=>true, 'method' => 'post']); ?>



                            <!-- SAMPLE NAME -->
                            <div class="form-group">
                                <?php $detail_code = $request->get('detail_titlename') ? $request->get('detail_code') : @$detail->detail_code ?>
                                <?php echo Form::label('detail_code', trans('sample::detail_admin.name').':'); ?>

                                <?php echo Form::text('detail_code', $detail_code, ['class' => 'form-control', 'placeholder' => trans('sample::detail_admin.name').'']); ?>

                                <?php $detail_img = $request->get('detail_titleimg') ? $request->get('detail_img') : @$detail->detail_img ?>
                                <?php echo Form::label('detail_img', trans('sample::detail_admin.name').':'); ?>

                                <?php echo Form::text('detail_img', $detail_img, ['class' => 'form-control', 'placeholder' => trans('sample::detail_admin.name').'']); ?>

                                <?php $detail_desription = $request->get('detail_titledes') ? $request->get('detail_desription') : @$detail->detail_desription ?>
                                <?php echo Form::label('detail_desription', trans('sample::detail_admin.name').':'); ?>

                                <?php echo Form::text('detail_desription', $detail_desription, ['class' => 'form-control', 'placeholder' => trans('sample::detail_admin.name').'']); ?>

                            </div>
                            <!-- /SAMPLE NAME -->



                            <?php echo Form::hidden('id',@$detail->detail_id); ?>



                            <!-- DELETE BUTTON -->
                            <a href="<?php echo URL::route('admin_detail.delete',['id' => @$detail->id, '_token' => csrf_token()]); ?>"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                Delete
                            </a>
                            <!-- DELETE BUTTON -->

                            <!-- SAVE BUTTON -->
                            <?php echo Form::submit('Save', array("class"=>"btn btn-info pull-right ")); ?>

                            <!-- /SAVE BUTTON -->

                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-md-4'>
            <?php echo $__env->make('sample::sample.admin.detail.detail_search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laravel-authentication-acl::admin.layouts.base-2cols', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title'); ?>
Admin area: edit group
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        
        <?php if($errors->has('model') ): ?>
        <div class="alert alert-danger"><?php echo $errors->first('model'); ?></div>
        <?php endif; ?>

        
        <?php $message = Session::get('message'); ?>
        <?php if( isset($message) ): ?>
        <div class="alert alert-success"><?php echo e($message); ?></div>
        <?php endif; ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                    <h3 class="panel-title bariol-thin"><?php echo isset($group->id) ? '<i class="fa fa-pencil"></i> Edit' : '<i class="fa fa-users"></i> Create'; ?> group</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        
                        <h4>General data</h4>
                        <?php echo Form::model($group, [ 'url' => [URL::route('groups.edit'), $group->id], 'method' => 'post'] ); ?>

                        <!-- name text field -->
                        <div class="form-group">
                            <?php echo Form::label('name','Name: *'); ?>

                            <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'group name']); ?>

                        </div>
                        <span class="text-danger"><?php echo $errors->first('name'); ?></span>
                        <?php echo Form::hidden('id'); ?>

                        <a href="<?php echo URL::route('groups.delete',['id' => $group->id, '_token' => csrf_token()]); ?>" class="btn btn-danger pull-right margin-left-5 delete">Delete</a>
                        <?php echo Form::submit('Save', array("class"=>"btn btn-info pull-right ")); ?>

                        <?php echo Form::close(); ?>

                    </div>
                    <div class="col-md-6 col-xs-12">
                    
                        <h4><i class="fa fa-lock"></i> Permissions</h4>
                        
                        <?php echo $__env->make('laravel-authentication-acl::admin.group.perm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<script>
    $(".delete").click(function(){
        return confirm("Are you sure to delete this item?");
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('laravel-authentication-acl::admin.layouts.base-2cols', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
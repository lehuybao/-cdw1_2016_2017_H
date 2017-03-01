<?php $__env->startSection('title'); ?>
    Admin area: users list
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
            <div class="col-md-9">
                
                <?php $message = Session::get('message'); ?>
                <?php if( isset($message) ): ?>
                    <div class="alert alert-success"><?php echo $message; ?></div>
                <?php endif; ?>
                
                <?php if($errors && ! $errors->isEmpty() ): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
                
                <?php echo $__env->make('laravel-authentication-acl::admin.user.user-table', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-md-3">
                <?php echo $__env->make('laravel-authentication-acl::admin.user.search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
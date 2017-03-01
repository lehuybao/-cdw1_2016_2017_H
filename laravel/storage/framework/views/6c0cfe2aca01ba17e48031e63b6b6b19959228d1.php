<?php echo Form::open(["route" => "groups.edit.permission","role"=>"form", 'class' => 'form-add-perm']); ?>

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon form-button button-add-perm"><span class="glyphicon glyphicon-plus-sign add-input"></span></span>
        <?php echo Form::select('permissions', $permission_values, '', ["class"=>"form-control permission-select"]); ?>

    </div>
    <span class="text-danger"><?php echo $errors->first('permissions'); ?></span>
    <?php echo Form::hidden('id', $group->id); ?>

    
    <?php echo Form::hidden('operation', 1); ?>

    </div>
    <div class="form-group">
        <?php if(! $group->exists): ?>
        <span class="text-danger"><h5>You need to create a group first.</h5></span>
        <?php endif; ?>
    </div>
<?php echo Form::close(); ?>


<?php if( $presenter->permissions ): ?>
<?php $__currentLoopData = $presenter->permissions_obj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php echo Form::open(["route" => "groups.edit.permission", "role"=>"form", 'name' => $permission->permission]); ?>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon form-button button-del-perm" name="<?php echo $permission->permission; ?>"><span class="glyphicon glyphicon-minus-sign add-input"></span></span>
                       <?php echo Form::text('permission_desc', $permission->description, ['class' => 'form-control', 'readonly' => 'readonly']); ?>

         <?php echo Form::hidden('permissions', $permission->permission); ?>

            <?php echo Form::hidden('id', $group->id); ?>

            
            <?php echo Form::hidden('operation', 0); ?>

        </div>
    </div>
    <?php echo Form::close(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php elseif($group->exists): ?>
<span class="text-warning"><h5>There is no permission associated to the group.</h5></span>
<?php endif; ?>

<?php $__env->startSection('footer_scripts'); ?>
@parent
<script>
    $(".button-add-perm").click( function(){
        <?php if($group->exists): ?>
        $('.form-add-perm').submit();
        <?php endif; ?>
    });
    $(".button-del-perm").click( function(){
        name = $(this).attr('name');
        $('form[name='+name+']').submit();
    });
</script>
<?php $__env->stopSection(); ?>
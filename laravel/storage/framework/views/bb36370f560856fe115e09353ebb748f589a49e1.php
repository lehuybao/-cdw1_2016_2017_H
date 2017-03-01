
<?php echo Form::open(["route" => "users.groups.add", 'class' => 'form-add-group', 'role' => 'form']); ?>

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon form-button button-add-group"><span class="glyphicon glyphicon-plus-sign add-input"></span></span>
        <?php echo Form::select('group_id', $group_values, '', ["class"=>"form-control"]); ?>

        <?php echo Form::hidden('id', $user->id); ?>

    </div>
    <span class="text-danger"><?php echo $errors->first('name'); ?></span>
</div>
<?php echo Form::hidden('id', $user->id); ?>

<?php if(! $user->exists): ?>
<div class="form-group">
    <span class="text-danger"><h5>You need to create the user first.</h5></span>
</div>
<?php endif; ?>
<?php echo Form::close(); ?>



<?php if( ! $user->groups->isEmpty() ): ?>
<?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <?php echo Form::open(["route" => "users.groups.delete", "role"=>"form", 'name' => $group->id]); ?>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon form-button button-del-group" name="<?php echo $group->id; ?>"><span class="glyphicon glyphicon-minus-sign add-input"></span></span>
            <?php echo Form::text('group_name', $group->name, ['class' => 'form-control', 'readonly' => 'readonly']); ?>

            <?php echo Form::hidden('id', $user->id); ?>

            <?php echo Form::hidden('group_id', $group->id); ?>

        </div>
    </div>
    <?php echo Form::close(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php elseif($user->exists): ?>
    <span class="text-warning"><h5>There is no groups associated to the user.</h5></span>
<?php endif; ?>

<?php $__env->startSection('footer_scripts'); ?>
@parent
<script>
    $(".button-add-group").click( function(){
        <?php if($user->exists): ?>
        $('.form-add-group').submit();
        <?php endif; ?>
    });
    $(".button-del-group").click( function(){
        name = $(this).attr('name');
        $('form[name='+name+']').submit();
    });
</script>
<?php $__env->stopSection(); ?>
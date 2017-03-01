<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="<?php echo URL::route('permission.edit'); ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New</a>
    </div>
</div>
<?php if( ! $permissions->isEmpty() ): ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Permission description</th>
            <th>Permission name</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td style="width:45%"><?php echo $permission->description; ?></td>
                <td style="width:45%"><?php echo $permission->permission; ?></td>
                <td style="witdh:10%">
                    <?php if(! $permission->protected): ?>
                    <a href="<?php echo URL::route('permission.edit', ['id' => $permission->id]); ?>"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                    <a href="<?php echo URL::route('permission.delete',['id' => $permission->id, '_token' => csrf_token()]); ?>" class="margin-left-5"><i class="fa fa-trash-o delete fa-2x"></i></a>
                    <?php else: ?>
                        <i class="fa fa-times fa-2x light-blue"></i>
                        <i class="fa fa-times fa-2x margin-left-12 light-blue"></i>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
<?php else: ?>
<span class="text-warning"><h5>No permissions found.</h5></span>
<?php endif; ?>
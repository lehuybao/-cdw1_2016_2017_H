<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="<?php echo URL::route('groups.edit'); ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New</a>
    </div>
</div>
<?php if( ! $groups->isEmpty() ): ?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Group name</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td style="width:90%"><?php echo $group->name; ?></td>
            <td style="width:10%">
            <?php if(! $group->protected): ?>
                <a href="<?php echo URL::route('groups.edit', ['id' => $group->id]); ?>"><i class="fa fa-edit fa-2x"></i></a>
                <a href="<?php echo URL::route('groups.delete',['id' => $group->id, '_token' => csrf_token()]); ?>" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
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
<span class="text-warning"><h5>No results found.</h5></span>
<?php endif; ?>
<div class="paginator">
    <?php echo $groups->appends($request->except(['page']) )->render(); ?>

</div>
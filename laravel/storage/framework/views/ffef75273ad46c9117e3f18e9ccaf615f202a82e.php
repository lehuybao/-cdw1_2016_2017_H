
<?php if( ! $samples->isEmpty() ): ?>
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'><?php echo e(trans('sample::sample_admin.order')); ?></td>
            <th style='width:10%'>Sample ID</th>
            <th style='width:50%'>Sample title</th>
            <th style='width:20%'><?php echo e(trans('sample::sample_admin.operations')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $samples->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        <?php $__currentLoopData = $samples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sample): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td><?php echo $sample->sample_id; ?></td>
            <td><?php echo $sample->sample_name; ?></td>
            <td>
                <a href="<?php echo URL::route('admin_sample.edit', ['id' => $sample->sample_id]); ?>"><i class="fa fa-edit fa-2x"></i></a>
                <a href="<?php echo URL::route('admin_sample.delete',['id' =>  $sample->sample_id, '_token' => csrf_token()]); ?>" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>
<?php else: ?>
<span class="text-warning"><h5>No results found.</h5></span>
<?php endif; ?>
<div class="paginator">
    <?php echo $samples->appends($request->except(['page']) )->render(); ?>

</div>
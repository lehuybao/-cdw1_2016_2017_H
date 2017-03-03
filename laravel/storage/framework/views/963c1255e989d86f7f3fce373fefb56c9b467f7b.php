
<?php if( ! $banner->isEmpty() ): ?>
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'><?php echo e(trans('sample::banner_admin.order')); ?></td>
            <th style='width:10%'>ID</th>
            <th style='width:50%'>Banner </th>
            <th style='width:20%'><?php echo e(trans('sample::banner_admin.operations')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nav = $banner->toArray();
        $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td>
                <?php echo $counter;
                $counter++ ?>
            </td>
            <td><?php echo $banner->banner_id; ?></td>
            <td><?php echo $banner->banner_img; ?></td>
            <td>
                <a href="<?php echo URL::route('admin_banner.edit', ['id' => $banner->banner_id]); ?>"><i class="fa fa-edit fa-2x"></i></a>
                <a href="<?php echo URL::route('admin_banner.delete',['id' =>  $banner->banner_id, '_token' => csrf_token()]); ?>" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
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
</div>
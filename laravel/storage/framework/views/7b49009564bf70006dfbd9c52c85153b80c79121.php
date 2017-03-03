
<?php if( ! $detail->isEmpty() ): ?>
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'><?php echo e(trans('sample::detail_admin.order')); ?></td>
            <th style='width:10%'>ID</th>
            <th style='width:10%'>code</th>
            <th style='width:20%'>img</th>
            <th style='width:30%'>des</th>
            <th style='width:20%'><?php echo e(trans('sample::detail_admin.operations')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nav = $detail->toArray();
        $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr>
            <td>
                <?php echo $counter;
                $counter++ ?>
            </td>
            <td><?php echo $detail->detail_id; ?></td>
            <td><?php echo $detail->detail_code; ?></td>
            <td><?php echo $detail->detail_img; ?></td>
            <td><?php echo $detail->detail_desription; ?></td>

            <td>
                <a href="<?php echo URL::route('admin_detail.edit', ['id' => $detail->detail_id]); ?>"><i class="fa fa-edit fa-2x"></i></a>
                <a href="<?php echo URL::route('admin_detail.delete',['id' =>  $detail->detail_id, '_token' => csrf_token()]); ?>" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
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
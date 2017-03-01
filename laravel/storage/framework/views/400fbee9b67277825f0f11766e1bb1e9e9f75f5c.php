<ul class="nav nav-sidebar">
<?php if(isset($sidebar_items) && $sidebar_items): ?>
<?php $__currentLoopData = $sidebar_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <li class="<?php echo LaravelAcl\Library\Views\Helper::get_active($data['url']); ?>"><a href="<?php echo $data['url']; ?>"><?php echo $data['icon']; ?> <?php echo e($name); ?></a></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php endif; ?>
</ul>

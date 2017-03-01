<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid margin-right-15">
        <div class="navbar-header">
            <a class="navbar-brand bariol-thin" href="#"><?php echo e($app_name); ?></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-main-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="nav-main-menu">
            <ul class="nav navbar-nav">
                <?php if(isset($menu_items)): ?>
                    <?php $__currentLoopData = $menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li class="<?php echo LaravelAcl\Library\Views\Helper::get_active_route_name($item->getRoute()); ?>"> <a href="<?php echo $item->getLink(); ?>"><?php echo $item->getName(); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            </ul>
            <div class="navbar-nav nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="dropdown-profile">
                        <?php echo $__env->make('laravel-authentication-acl::admin.layouts.partials.avatar', ['size' => 30], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <span id="nav-email"><?php echo isset($logged_user) ? $logged_user->email : 'User'; ?></span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo URL::route('users.selfprofile.edit'); ?>"><i class="fa fa-user"></i> Your profile</a>
                            </li>
                            <li class="divider"></li>
                        <li>
                            <a href="<?php echo URL::route('user.logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </div><!-- nav-right -->
        </div><!--/.nav-collapse -->
    </div>
</div>
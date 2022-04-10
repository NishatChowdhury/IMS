<div class="container-fluid">
    <div class="navbar p-0 navbar-expand-lg">
        
        
        
        
        <span aria-expanded="false" class="navbar-toggler ml-auto collapsed" data-target="#ec-nav__collapsible" data-toggle="collapse">
        <div class="hamburger hamburger--spin js-hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </span>
        <div class="collapse navbar-collapse when-collapsed" id="ec-nav__collapsible">
            <ul class="nav navbar-nav ec-nav__navbar ml-auto">
                <li class="nav-item nav-item__has-megamenu megamenu-col-2">
                    <a class="nav-link" href="<?php echo e(url('/')); ?>" ><?php echo e(__('Home')); ?></a>
                </li>
                <?php $__currentLoopData = menus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item nav-item__has-dropdown">
                        <a class="nav-link <?php echo e($menu->hasChild() ? 'dropdown-toggle' : ''); ?>" href="<?php echo e($menu->uri); ?>" <?php echo e($menu->hasChild() ? 'data-toggle=dropdown' : ''); ?>><?php echo e($menu->name); ?></a>
                        <?php if($menu->hasChild()): ?>
                            <div class="dropdown-menu">
                                <ul class="list-unstyled">
                                    <?php $__currentLoopData = $menu->children->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="<?php echo e($subMenu->hasChild() ? 'nav-item__has-dropdown' : ''); ?>">
                                            <a class="nav-link__list <?php echo e($subMenu->hasChild() ? 'dropdown-toggle' : ''); ?>" href="<?php echo e(url('page',$subMenu->uri)); ?>" <?php echo e($subMenu->hasChild() ? 'data-toggle=dropdown' : ''); ?>> <?php echo e($subMenu->name); ?> </a>
                                            <?php if($subMenu->hasChild()): ?>
                                                <div class="dropdown-menu">
                                                    <ul class="list-unstyled">
                                                        <?php $__currentLoopData = $subMenu->children->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a class="nav-link__list" href="<?php echo e(url('page',$subSubMenu->uri)); ?>"> <?php echo e($subSubMenu->name); ?> </a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div> <!-- END container-->
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/inc/dynamic-menu.blade.php ENDPATH**/ ?>
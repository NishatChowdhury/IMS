<div class="container">
    <div class="row align-items-center justify-content-between mx-0">
        <ul class="list-inline d-none d-lg-block mb-0">
            <li class="list-inline-item mr-3">
                <div class="d-flex align-items-center">
                    <i class="ti-email mr-2"></i>
                    <a href="mailto:<?php echo e(siteConfig('email')); ?>"><?php echo e(siteConfig('email')); ?></a>
                </div>
            </li>
            <li class="list-inline-item mr-3">
                <div class="d-flex align-items-center">
                    <i class="fas fa-phone-square-alt mr-2"></i>
                    <a href="tel:<?php echo e(siteConfig('phone')); ?>"><?php echo e(siteConfig('phone')); ?></a>
                </div>
            </li>
        </ul>
        <ul class="list-inline mb-0">
            <li class="list-inline-item mr-0 p-3 border-right border-left border-white-0_1">
                <span>EIIN: <?php echo e(siteConfig('eiin')); ?></span>
            </li>
            <li class="list-inline-item mr-0 p-3 border-right border-white-0_1">
                <span>Institute Code: <?php echo e(siteConfig('code')); ?></span>
            </li>
        </ul>
        <ul class="list-inline mb-0">
            <li class="list-inline-item mr-0 p-md-3 p-2 border-right border-left border-white-0_1">
                <a href="<?php echo e(url('student/login')); ?>"><?php echo e(__('Login')); ?></a>
            </li>
        </ul>
    </div> <!-- END END row-->
</div> <!-- END container-->
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/inc/info-bar.blade.php ENDPATH**/ ?>
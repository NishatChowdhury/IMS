<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Title-->
    <title><?php echo e(siteConfig('title')); ?></title>

    <!-- SEO Meta-->
    <meta name="description" content="IMS software for educational institute">
    <meta name="keywords" content="web point ltd,school,college,ims,software">
    <meta name="author" content="web point ltd">

    <!-- viewport scale-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/logos')); ?>/<?php echo e(siteConfig('logo')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/favicon/114x114.png')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('assets/img/favicon/96x96.png')); ?>">

    <!--Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700%7CWork+Sans:400,500">


    <!-- Icon fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome/css/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/themify-icons/css/themify-icons.css')); ?>">


    <!-- stylesheet-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/vendors.bundle.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/print.css?ver:1.1')); ?>">

    <?php echo $__env->yieldContent('style'); ?>

    
    <?php if(theme() == 1): ?>
        <link rel="stylesheet" href="<?php echo e(asset('dist/css/green.css?ver:2.0')); ?>">
    <?php elseif(theme() == 2): ?>
        <link rel="stylesheet" href="<?php echo e(asset('dist/css/navy.css?ver:1.0')); ?>">
    <?php endif; ?>

</head>

<body>

    
    
    

    <header class="site-header bg-dark text-white-0_5">
            <?php echo $__env->make('front.inc.info-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('front.inc.title-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </header><!-- END site header-->

    <nav class="ec-nav sticky-top bg-white no-print">
        
        <?php echo $__env->make('front.inc.dynamic-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </nav> <!-- END ec-nav -->

    <div class="site-search">
        <div class="site-search__close bg-black-0_8"></div>
        <form class="form-site-search" action="#" method="POST">
            <div class="input-group">
                <input type="text" placeholder="Search" class="form-control py-3 border-white" required="">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
                </div>
            </div>
        </form>
    </div> <!-- END site-search-->

    <?php echo $__env->yieldContent('content'); ?>


    <footer class="site-footer">
        <?php echo $__env->make('front.inc.footer-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('front.inc.footer-bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer> <!-- END site-footer -->


    <div class="scroll-top">
        <i class="ti-angle-up"></i>
    </div>






















    <script src="<?php echo e(asset('assets/js/vendors.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>


<!-- Pull to refresh -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pulltorefreshjs/0.1.21/index.umd.min.js" integrity="sha512-oEw4xuIi6LVmWze9XMkOUKVrN3l4gIMDrnuci0T3NlcM5tbK9R21ZgP6mqOcit7m41sahXSIG88WOPKgFSWalA==" crossorigin="anonymous"></script>





<script>
    const ptr = PullToRefresh.init({
        mainElement: 'body',
        onRefresh() {
            window.location.reload();
        }
    });
</script>

</body>
</html>
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/layouts/front.blade.php ENDPATH**/ ?>
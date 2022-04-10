<section class="" data-primary-overlay="0" style="background-color:<?php echo e(themeConfig('header_background')); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-center d-md-flex align-items-center">
                <div class="navbar-brand">
                    <!--                            <a class="logo-default" :href="'/'"><img alt="" :src="'http://'+asset+'/assets/img/logos/'+title.logo" width="75" height="75"></a>-->
                    <a class="logo-default" href="<?php echo e(url('/')); ?>">
                        <img alt="" src="<?php echo e(asset('assets/img/logos')); ?>/<?php echo e(siteConfig('logo')); ?>" height="<?php echo e(siteConfig('logo_height')); ?>">
                    </a>
                </div>
            </div>
            <div class="col-md-10 text-blue text-center">
                <h2 class="mb-4">
                    <span style="color:<?php echo e(siteConfig('name_color')); ?>;font-size:<?php echo e(siteConfig('name_size')); ?>px;font-family:<?php echo e(siteConfig('name_font')); ?>;"><?php echo e(siteConfig('name')); ?></span><br>
                    <span style="color:<?php echo e(siteConfig('bn_color')); ?>;font-size:<?php echo e(siteConfig('bn_size')); ?>px;font-family:<?php echo e(siteConfig('bn_font')); ?>;"><?php echo e(siteConfig('bn')); ?></span>
                </h2>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/inc/title-bar.blade.php ENDPATH**/ ?>
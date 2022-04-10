<div class="footer-top bg-black-0_9 text-white-0_6 pt-1 pb-1">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6 mt-5">
                <img src="assets/img/logo-white.png" alt="Logo" width="100">
                <div class="margin-y-40 text-justify">
                    <p>
                        <?php echo e(__('WP-IMS is a latest technology of educational institute’s digitization. This is the fastest and most intelligent application ever made in Bangladesh.')); ?>

                    </p>
                </div>
            </div>


            <div class="col-lg-4 col-md-6 mt-5">
                <h4 class="h5 text-white"><?php echo e(__('Important links')); ?></h4>
                <div class="width-3rem bg-primary height-3 mt-3"></div>
                <ul class="list-unstyled marginTop-40">
                    <?php $__currentLoopData = importantLinks(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="mb-2"><a href="<?php echo e($link->link); ?>"><?php echo e($link->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    
                    
                    
                    
                </ul>

                <ul class="list-inline">
                    <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="<?php echo e(socialConfig('facebook')); ?>" target="_blank"><i class="ti-facebook"> </i></a></li>
                    <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="<?php echo e(socialConfig('twitter')); ?>" target="_blank"><i class="ti-twitter"> </i></a></li>
                    <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="<?php echo e(socialConfig('linkendin')); ?>" target="_blank"><i class="ti-linkedin"> </i></a></li>
                    <li class="list-inline-item"><a class="iconbox bg-white-0_2 hover:primary" href="<?php echo e(socialConfig('youtube')); ?>" target="_blank"><i class="ti-youtube"></i></a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 mt-5">
                <h4 class="h5 text-white"><?php echo e(__('Contact Us')); ?></h4>
                <div class="width-3rem bg-primary height-3 mt-3"></div>
                <ul class="list-unstyled marginTop-40">
                    <li class="mb-3"><i class="ti-headphone mr-3"></i><a href="tel:<?php echo e(siteConfig('phone')); ?>"><?php echo e(siteConfig('phone')); ?></a></li>
                    <li class="mb-3"><i class="ti-email mr-3"></i><a href="mailto:<?php echo e(siteConfig('email')); ?>"><?php echo e(siteConfig('email')); ?></a></li>
                    <li class="mb-3">
                        <div class="media">
                            <i class="ti-location-pin mt-2 mr-3"></i>
                            <div class="media-body">
                                <span><?php echo e(siteConfig('address')); ?></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            
                
                
                
                    
                    
                        
                            
                            
                                
                            
                        
                    
                
            

        </div> <!-- END row-->
    </div> <!-- END container-->
</div> <!-- END footer-top-->
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/inc/footer-top.blade.php ENDPATH**/ ?>
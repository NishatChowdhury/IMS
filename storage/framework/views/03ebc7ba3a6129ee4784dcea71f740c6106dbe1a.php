<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($key); ?>" class="<?php echo e($slider->active == 1 ? 'active' : ''); ?>"></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
    </ol>

    <div class="carousel-inner">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item padding-y-80 height-90vh <?php echo e($key == 0 ? 'active' : ''); ?>">
                <div class="bg-absolute" data-dark-overlay="4" style="background:url('<?php echo e(asset('assets/img/sliders')); ?>/<?php echo e($slider->image); ?>') no-repeat"></div>
                
                    
                        
                            
                                
                            
                            
                                
                            
                            
                        
                    
                
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
            
            
                
                    
                        
                            
                        
                        
                            
                        
                        
                    
                
            
        
        
            
            
                
                    
                        
                            
                        
                        
                            
                        
                        
                    
                
            
        
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i class="ti-angle-left iconbox bg-black-0_5 hover:primary"></i>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i class="ti-angle-right iconbox bg-black-0_5 hover:primary"></i>
    </a>
</div>
<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
    <ul>
        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php if($notice->start): ?>[<?php echo e($notice->start->format('Y-m-d')); ?>]<?php endif; ?><a href="<?php echo e(action('Front\FrontController@noticeDetails',$notice->id)); ?>">&nbsp;<?php echo e($notice->title); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</marquee>

<?php $__env->startSection('style'); ?>
    <style>
        marquee ul {
            margin: .5rem;
        }

        marquee ul li {
            /*float: left !important;*/
            display: inline-block;
            padding-right: 1.5rem;
            list-style: disclosure-closed inside;
            color: green;
            font-weight: bold;
        }

        .car-height{
            min-height: 100% !important;
        }

        /*@media (min-width: 576px) {*/
        /*    .res-height{*/
        /*        min-height: auto;*/
        /*    }*/
        /*}*/

        /*@media (min-width: 768px) {*/
        /*    .res-height{*/
        /*        min-height: 60vh;*/
        /*    }*/
        /*}*/

        /*@media (max-width: 767.98px) {*/
        /*    .res-height{*/
        /*        min-height: 60vh;*/
        /*    }*/
        /*}*/

        /*@media (max-width: 991.98px) {*/
        /*    .res-height{*/
        /*        min-height: 55vh;*/
        /*    }*/
        /*}*/

        /*@media (min-width: 992px) {*/
        /*    .res-height{*/
        /*        min-height: 90vh;*/
        /*    }*/
        /*}*/

    </style>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/carousel.blade.php ENDPATH**/ ?>
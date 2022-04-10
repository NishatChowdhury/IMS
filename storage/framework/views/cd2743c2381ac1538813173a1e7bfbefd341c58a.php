<section class="paddingTop-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">
                    Our Teachers
                </h2>
                <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
            </div>
        </div> <!-- END row-->

        <div class="row marginTop-60">
            <div class="owl-carousel arrow-edge arrow-black" data-space="0"  data-items="4" data-arrow="true" data-tablet-items="2" data-mobile-items="1">
                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hover:parent">
                        <img class="w-100 transition-0_3 hover:zoomin" src="<?php echo e(asset('assets/img/staffs')); ?>/<?php echo e($teacher->image); ?>" alt="<?php echo e($teacher->name); ?>" style="height: 400px">
                        <div class="card-img-overlay transition-0_3 flex-center bg-black-0_7 hover:show">
                            <a href="<?php echo e(asset('assets/img/staffs')); ?>/<?php echo e($teacher->image); ?>" data-fancybox="gallery1" class="iconbox iconbox-md bg-white ti-zoom-in text-primary"></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div> <!-- END row-->

    </div> <!-- END container-->
</section>
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/teacher.blade.php ENDPATH**/ ?>
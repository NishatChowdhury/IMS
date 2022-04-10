<section class="bg-light-v2 paddingTop-80 paddingBottom-100">
    <div class="container">
        <div class="row text-center">
            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4 marginTop-30">
                <a href="#" class="card shadow-v1 align-items-center p-5 hover:transformTop">
                    <img src="<?php echo e(asset('assets/img/features/')); ?>/<?php echo e($feature->image); ?>" alt="<?php echo e($feature->name); ?>" height="80">
                    <h4 class="mt-2">
                        <?php echo e($feature->name); ?>

                    </h4>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>   <!-- END section-->
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/features.blade.php ENDPATH**/ ?>
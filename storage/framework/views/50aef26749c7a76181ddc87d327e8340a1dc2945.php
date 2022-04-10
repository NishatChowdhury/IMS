
<section class="padding-y-100" data-primary-overlay="7" style="background:url(assets/img/1920/962.jpg) no-repeat">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center text-white mb-md-4">
                <h2 class="mb-4">
                    Upcoming Events
                </h2>
                <div class="width-3rem height-4 rounded bg-white mx-auto"></div>
            </div>

            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mt-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo e(asset('assets/img/events/')); ?>/<?php echo e($event->image); ?>" alt="">
                    <div class="card-body">
                        <h4 class="h5">
                            <?php echo e($event->title); ?>

                        </h4>
                        <ul class="list-unstyled my-4 line-height-xl">
                            <li>
                                <i class="ti-time mr-2 text-primary"></i>
                                <?php echo e($event->date->format('F d, Y')); ?> @ <?php echo e($event->time); ?>

                            </li>
                            <li>
                                <i class="ti-location-pin mr-2 text-primary"></i>
                                <?php echo e($event->venue); ?>

                            </li>
                        </ul>
                        <a href="<?php echo e(action('Front\FrontController@event',$event->id)); ?>" class="text-primary">
                            View Details
                            <i class="ti-angle-double-right small"></i>
                        </a>
                    </div>
                </div>
            </div> <!-- END col-md-4-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


















































            <div class="col-12 mt-5 text-center">
                <a href="<?php echo e(action('Front\FrontController@events')); ?>" class="btn btn-outline-white-hover">More Events</a>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/events.blade.php ENDPATH**/ ?>
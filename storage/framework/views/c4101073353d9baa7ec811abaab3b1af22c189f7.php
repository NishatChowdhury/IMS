<section class="bg-light-v2 padding-y-100">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-md-4">
                <h2 class="mb-4">
                    Campus News
                </h2>
                <div class="width-3rem height-4 rounded bg-primary mx-auto"></div>
            </div>
        </div> <!-- END row-->
        <div class="row">
            <div class="col-lg-6">
                <?php $__currentLoopData = $newses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="list-card align-items-center marginTop-30">
                    <div class="col-md-4 px-md-0">
                        <img class="w-100" src="<?php echo e(asset('assets/files/notice')); ?>/<?php echo e($news->file); ?>" alt="">
                    </div>
                    <div class="col-md-8 p-4">
                        <p class="text-primary"><?php echo e($news->start->format('F d, Y')); ?></p>
                        <a href="<?php echo e(action('Front\FrontController@newsDetails',$news->id)); ?>" class="h5">
                            <?php echo e($news->title); ?>

                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($latestNews): ?>
            <div class="col-lg-6 marginTop-30">
                <div class="card">
                    <img class="card-img-top" src="<?php echo e(asset('assets/files/notice')); ?>/<?php echo e($latestNews->file); ?>" alt="">
                    <div class="card-body">
                        <p class="text-primary">
                            <?php echo e($latestNews->start->format('F d, Y')); ?>

                        </p>
                        <h4>
                            <a href="#">
                                <?php echo e($latestNews->title); ?>

                            </a>
                        </h4>
                        <p>
                            <?php echo e(substr($latestNews->description,0,100)); ?>

                        </p>
                        <a href="<?php echo e(action('Front\FrontController@newsDetails',$latestNews)); ?>" class="btn btn-outline-primary">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/news.blade.php ENDPATH**/ ?>
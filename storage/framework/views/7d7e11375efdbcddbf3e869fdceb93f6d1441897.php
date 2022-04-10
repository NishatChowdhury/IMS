
<section class="padding-y-100 bg-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row align-items-center">








                    <div class="col-md-12 mt-4">
                        <?php echo $about->body; ?>








                        <a href="<?php echo e(action('Front\FrontController@page','history')); ?>" class="btn btn-outline-white-hover">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-md-0">
                <div class="card shadow-v2 z-index-5" data-offset-top-xl="-160">
                    <div class="card-header text-white border-bottom-0" style="background-color: #97a1aa">
                        <span class="lead font-semiBold text-uppercase">
                            Notice Board
                         </span>
                    </div>

                    <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="p-4 border-bottom wow fadeInUp">
                            <p class="text-warning mb-1">
                                <?php if($notice->start): ?>
                                    <?php echo e($notice->start->format('Y-m-d')); ?>

                                <?php else: ?>
                                    <?php echo e($notice->created_at->format('Y-m-d')); ?>

                                <?php endif; ?>
                            </p>
                            <a href="<?php echo e(action('Front\FrontController@noticeDetails',$notice->id)); ?>" class="text-info">
                                <?php echo e(strip_tags($notice->title)); ?>

                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="p-4">
                        <a href="<?php echo e(action('Front\FrontController@notice')); ?>" class="btn btn-link pl-0">
                            View All Notices
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- END row-->
    </div> <!-- END container-->
</section>
<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/notice.blade.php ENDPATH**/ ?>
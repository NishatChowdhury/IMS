<?php $__env->startSection('title',ucfirst($page->name)); ?>

<?php $__env->startSection('content'); ?>

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2><?php echo e(ucfirst($page->name)); ?></h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <?php echo e(ucfirst($page->name)); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <?php echo $page->content; ?>

                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-inner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/pages/page.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title','Online Admission Form'); ?>
<?php $data = Session::get('studentStore'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="mb-5 text-center p-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-success">
                        <b><?php echo e($data['name']); ?></b> <?php echo e(__('your admission request has been submitted successfully your application Id')); ?> <?php echo e($data['id']); ?>

                        <a href="<?php echo e(route('download.school.form', $data['id'])); ?>" class="btn btn-primary">Download Application Form</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-inner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/admission/admission-success-school.blade.php ENDPATH**/ ?>
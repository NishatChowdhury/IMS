<?php $__env->startSection('title','Settings | About Institute'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About Institute</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">About Institute</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- ***Site info Inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>About Institute</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <ul class="text-danger">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('instituteMessageUpadte')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e($aboutInstitute->alias); ?>" name="alias">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">About Institute</label>
                                    <textarea name="body" id="formsummernote" cols='30px' rows='10px' class="form-control" id="exampleFormControlTextarea1" rows="4"><?php echo e($aboutInstitute->body); ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value=" Save ">
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>About Institute</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <ul class="text-danger">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <h4>About Institute</h4>
                            <hr>
                            <div class="row">

                                <div class="col-md-12">

                                    <p><?php echo $aboutInstitute->body; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugin-css'); ?>
    <link rel="stylesheet" href="http://localhost/adminlte-alpha/public/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/imageupload.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugin'); ?>
    <script src="<?php echo e(asset('plugins/select2/select2.full.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>

        $('#formsummernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 500,
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/aboutInstitute/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title','Settings | Principal Message'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Principal Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Principal Message</li>
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
                                <h5>Principal Message</h5>
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
                            <form action="<?php echo e(route('instituteMessageUpadte')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e($message->alias); ?>" name="alias">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="<?php echo e($message->title); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Principal Message</label>
                                    <textarea name="body" id="formsummernote" cols='30px' rows='10px' class="form-control" id="exampleFormControlTextarea1" rows="4"><?php echo e($message->body); ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Principal Image</label>
                                    <input name="image" class="form-control" class="btn btn-outline-success" type="file" id="formFile">
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
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <img   height="200px"  width="180px" src="<?php echo e(asset('uploads/message/'.$message->image)); ?>" alt="">
                                </div>
                                <div class="col-md-7 ml-4">
                                    <h2>
                                        <?php echo e($message->title); ?>

                                    </h2>
                                    <span aria-hidden="true"><?php echo Str::limit($message->body, 500); ?></span>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" > More..</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if($message->alias == 'principal'): ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <h5>Principal Message</h5>
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
                                <div class="row">
                                    <div class="col-md-4">
                                        <img style="margin-top: 10px"  height="200px"  width="200px" src="<?php echo e(asset('uploads/message/'.$message->image)); ?>" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <h2>
                                            <small class="text-primary d-block">
                                                Principal
                                            </small>
                                            Message
                                        </h2>
                                        <p><?php echo e($message->title); ?></p>
                                        <span aria-hidden="true"><?php echo $message->body; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugin-css'); ?>
    <!-- Select2 -->
    <link rel="stylesheet" href="http://localhost/adminlte-alpha/public/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/imageupload.css')); ?>">
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugin'); ?>
    <!-- Select2 -->
    <script src="<?php echo e(asset('plugins/select2/select2.full.min.js')); ?>"></script>
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    <script>
        /**
         *  Document   : summernote-init.js
         *  Author     : redstar
         *  Description: script for set summernote properties
         *
         **/
        // $('#summernote').summernote({
        //     placeholder: '',
        //     tabsize: 2,
        //     tooltip: false,
        //     height: 150
        // });
        // $('#formsummernote').summernote({
        //     placeholder: '',
        //     tabsize: 2,
        //     tooltip: false,
        //     height: 500
        // });
        $('#formsummernote').summernote({
            placeholder: '',
            tabsize: 2,
            //tooltip: false,
            height: 500,
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/aboutInstitute/principal.blade.php ENDPATH**/ ?>
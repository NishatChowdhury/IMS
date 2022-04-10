<?php $__env->startSection('title','Settings | Site Basic Info'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Site Basic Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Site Basic Info</li>
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
                                <h5>Site Information</h5>
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
                            <?php echo e(Form::model($info,['action'=>'Backend\SiteInformationController@update','method'=>'patch'])); ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <?php echo e(Form::text('title',null,['class'=>'form-control'])); ?>

                                </div>
                                
                                
                                
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <?php echo e(Form::text('name',null,['class'=>'form-control'])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Name Font</label>
                                    <?php echo e(Form::text('name_font',null,['class'=>'form-control'])); ?>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Name Size</label>
                                    <?php echo e(Form::text('name_size',null,['class'=>'form-control'])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Name Color</label>
                                    <div class="input-group my-colorpicker2">
                                        <?php echo e(Form::text('name_color',null,['class'=>'form-control'])); ?>

                                        <div class="input-group-append input-group-addon">
                                            <span class="input-group-text">
                                                <i></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">বাংলা নাম</label>
                                    <?php echo e(Form::text('bn',null,['class'=>'form-control'])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">বাংলা নাম  ফন্ট</label>
                                    <?php echo e(Form::text('bn_font',null,['class'=>'form-control'])); ?>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">বাংলা নাম  সাইজ</label>
                                    <?php echo e(Form::text('bn_size',null,['class'=>'form-control'])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">বাংলা নাম  রঙ</label>
                                    <div class="input-group my-colorpicker2">
                                        <?php echo e(Form::text('bn_color',null,['class'=>'form-control my-colorpicker1'])); ?>

                                        <div class="input-group-append input-group-addon">
                                            <span class="input-group-text">
                                                <i></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <?php echo e(Form::text('address',null,['class'=>'form-control'])); ?>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Institution Code</label>
                                    <?php echo e(Form::text('institute_code',null,['class'=>'form-control'])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="eiinNo">EIIN No</label>
                                    <?php echo e(Form::text('eiin',null,['class'=>'form-control'])); ?>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Phone</label>
                                    <?php echo e(Form::text('phone',null,['class'=>'form-control'])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <?php echo e(Form::text('email',null,['class'=>'form-control'])); ?>

                                </div>
                            </div>
                            <div class="form-group text-center">
                                <?php echo e(Form::submit('SAVE',['class'=>'btn btn-success'])); ?>

                                <?php echo e(Form::reset('RESET',['class'=>'btn btn-warning'])); ?>

                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>Site Logo</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php echo e(Form::model($info,['action'=>'Backend\SiteInformationController@logo','method'=>'patch','files'=>true])); ?>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title">Logo Height</label>
                                    <?php echo e(Form::text('logo_height',null,['class'=>'form-control','placeholder'=>'Logo Height'])); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Logo Text Bottom</label>
                                    <input type="text" class="form-control" id="" placeholder="type..">
                                </div>
                            </div>
                            <div class="form-group files color">
                                <input type="file" class="form-control" multiple="" name="logo">
                            </div>
                            <div class="form-row">
                                <?php echo e(Form::submit('SAVE',['class'=>'btn btn-success'])); ?>

                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="card mt-2">
                        <?php echo e(Form::model($info,['action'=>'Backend\SiteInformationController@update_google_map','method'=>'patch'])); ?>

                        <div class="card-header">
                            <h5>Google Map</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Google Map Embed Code: </label>
                                <?php echo e(Form::textarea('map',null,['class'=>'form-control','placeholder'=>'Paste Google Map Embed Code Here:','rows'=>'4', 'cols'=>'100'])); ?>

                            </div>
                            <div class="form-row">
                                <?php echo e(Form::submit('UPDATE',['class'=>'btn btn-success'])); ?>

                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                </div>
            </div>
            
            
            
        </div>
    </section>

<?php $__env->stopSection(); ?>
<!--Site info Inner Content End***-->

<?php $__env->startSection('plugin-css'); ?>
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/colorpicker/bootstrap-colorpicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('plugin'); ?>
    <!-- bootstrap color picker -->
    <script src="<?php echo e(asset('plugins/colorpicker/bootstrap-colorpicker.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<!-- *** External CSS File-->
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/imageupload.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        //Colorpicker
        $('.my-colorpicker1').colorpicker();
        $('.my-colorpicker2').colorpicker();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/principalMessage/index.blade.php ENDPATH**/ ?>
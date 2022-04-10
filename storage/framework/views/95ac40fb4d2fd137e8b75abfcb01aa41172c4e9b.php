<?php $__env->startSection('title','Institution Mgnt | Signature'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Signature</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution</a></li>
                        <li class="breadcrumb-item active">Signature</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <?php if($errors->any()): ?>
        <ul class="label-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="text-danger"><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <table id="example2" class="table table-bordered" style="margin: 10px;">
                                    <thead>
                                    <tr>
                                        <th>
                                            <h3 class="card-title"> Institution Signature </h3>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="card-body">
                                                <?php echo e(Form::open(['action'=>'Backend\InstitutionController@sig','method'=>'post','files'=>true])); ?>

                                                    <div class="form-group row">


                                                        <div class="col-sm-10 mb-4">
                                                            <div class="input-group">
                                                                <?php echo e(Form::file('signature',['onchange'=>'readURL(this)','class'=>'form-control', 'id'=>"file-input"])); ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <?php echo e(Form::submit('Save Signature',['class'=>'btn btn-success'])); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php echo e(Form::close()); ?>

                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table id="example2" class="table table-bordered" style="margin: 10px;">
                                    <thead>
                                    <tr>
                                        <th>
                                            <h3 class="card-title"> Preview </h3>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="card-body" style="display:flex;justify-content: center">
                                                <img src="<?php echo e(asset('assets/img/signature/signature.png')); ?>" width="200" id="blah" alt="" >
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result).width(150).height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/institution/signature.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title','Student Registration'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('Add New Student')); ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-light">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo Form::open(['action'=>'Backend\StudentController@store', 'method'=>'post', 'enctype'=>'multipart/form-data']); ?>

                            <?php echo $__env->make('admin.student.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo Form::close(); ?>

                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).on('change', '.session', function () {
            var id= $(this).val();

            $.ajax({
                url: '<?php echo e(url("get-ClassSectionBySession/")); ?>'+id,
                type: 'GET',
                success:function (data) {
                    console.log(data);
                    if (data.length>0){
                        var $select_class =  $('.class');
                        var html = '<option disabled selected> Select Class-Section</option>';
                        $.each(data, function (idx, item) {
                            html += '<option value="' + item.id + '" data-id="'+item.section_id+'" >' + item.name + ' [ Sec- '+item.section+' ]</option>';
                        });
                        $select_class.html(html);
                    }
                }
            });
        });

        $(document).on('change', '.class', function () {
            //var id = $(this).val();
            var section_id = $(this).attr("data-id");
            console.log(section_id);
            $('.section').html(section_id);
        });

        $(document).on('keyup','#rank', function () {
            alert();
            var academicYear = $('.year').val();
            $.ajax({
                url:"<?php echo e(url('admin/load_student_id')); ?>",
                type:'GET',
                data:{academicYear:academicYear},
                success:function (data) {
                    console.log(data);
                    $('#studentID').val(data);

                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/student/create.blade.php ENDPATH**/ ?>
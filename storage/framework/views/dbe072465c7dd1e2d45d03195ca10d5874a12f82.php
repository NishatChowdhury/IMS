<?php $__env->startSection('title','Institution Mgnt | Academic Year'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Academic Year</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution Mgnt</a></li>
                        <li class="breadcrumb-item active">Academic Year</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">

                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Academic Year Name</th>
                                    <th>Duration</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $sessions ?? ''; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($session->id); ?></td>
                                        <td><?php echo e($session->year); ?></td>
                                        <td><?php echo e($session->start); ?> - <?php echo e($session->end); ?></td>
                                        <td><?php echo e($session->description); ?></td>
                                        <td>
                                            <?php echo e(Form::model($session,['action'=>['Backend\InstitutionController@sessionStatus',$session->id],'method'=>'patch','onsubmit'=>'return statusChange()'])); ?>

                                            <?php if($session->active == 0): ?>
                                                <button class="btn btn-danger btn-sm">Inactive</button>
                                            <?php else: ?>
                                                <button class="btn btn-success btn-sm">Active</button>
                                            <?php endif; ?>
                                            <?php echo e(Form::close()); ?>

                                        </td>
                                        <td>





                                            <a type="button" href="<?php echo e(action('Backend\InstitutionController@delete_session', $session->id)); ?>"
                                            class="btn btn-danger btn-sm delete_session"
                                            style="margin-left: 10px;"> <i class="fas fa-trash"></i>
                                            </a>

                                            <?php echo e(Form::close()); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***/ Pop Up Model for button -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Academic Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo Form::open(['action'=>'Backend\InstitutionController@store_session', 'method'=>'post']); ?>

                    <div class="form-group row">
                        <?php echo Form::label('Academic Year*', null, ['class' => 'control-label, col-sm-2', 'style'=>'font-weight: 500; text-align: right']); ?>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php echo Form::text('year', null, array_merge(['class' => 'form-control', 'placeholder'=>'ex-2017-2019'])); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('Start Date', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right']); ?>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php echo Form::text('start', null, array_merge(['class' => 'form-control datePicker'])); ?>

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('End Date', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right']); ?>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php echo Form::text('end', null, array_merge(['class' => 'form-control datePicker'])); ?>

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('Description', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right']); ?>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php echo Form::textarea('description', null, array_merge(['class' => 'form-control','rows'=>'3'])); ?>

                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->

    
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Academic Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo Form::open(['action'=>'Backend\InstitutionController@update_session', 'method'=>'post']); ?>

                    <?php echo Form::hidden('session_id', null,['id'=>'session_id']); ?>

                    <div class="form-group row">
                        <?php echo Form::label('Academic Year*', null, ['class' => 'control-label, col-sm-2', 'style'=>'font-weight: 500; text-align: right']); ?>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php echo Form::text('year', null, array_merge(['class' => 'form-control', 'id'=>'year', 'placeholder'=>'ex-2017-2019'])); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('Start Date', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right']); ?>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php echo Form::text('start', null, array_merge(['class' => 'form-control datePicker','id'=>'start'])); ?>

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('End Date', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right']); ?>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php echo Form::text('end', null, array_merge(['class' => 'form-control datePicker','id'=>'end'])); ?>

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2"> <i class="far fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('Description', null, ['class' => 'control-form-label, col-sm-2','style'=>'font-weight: 500; text-align: right']); ?>

                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php echo Form::textarea('description', null, array_merge(['class' => 'form-control','id'=>'description','rows'=>'3'])); ?>

                            </div>
                        </div>
                    </div>

                    <div style="float: right">
                        <button type="submit" class="btn btn-success btn-sm" > <i class="fas fa-plus-circle"></i> Update </button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<!-- *** External CSS File-->
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datepicker3.min.css')); ?>">
<?php $__env->stopSection(); ?>

<!-- *** External JS File-->
<?php $__env->startSection('plugin'); ?>
    <script src= "<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>

        $(document).on('click', '.edit_session', function () {
            $("#edit").modal("show");
            var session_id = $(this).attr('value');

            $.ajax({
                method:"post",
                url:"<?php echo e(url('admin/institution/edit-session')); ?>",
                data:{session_id:session_id,"_token":"<?php echo e(csrf_token()); ?>"},
                dataType:"json",
                success:function(response){
                    console.log(response);
                    $("#session_id").val(response.id);
                    $("#year").val(response.year);
                    $("#start").val(response.start);
                    $("#end").val(response.end);
                    $("#description").val(response.description);
                },
                error:function(err){
                    console.log(err);
                }
            });
        });

        // datePicker
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                })
        });

        function statusChange(){
            var x = confirm('Are you sure, you want to change status?');
            return !!x;
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/institution/academicyear.blade.php ENDPATH**/ ?>
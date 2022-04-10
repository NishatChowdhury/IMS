<?php $__env->startSection('title','Settings | Academic Calender'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Academic Calender</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        <li class="breadcrumb-item active">Academic Calender</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- ***/Image page inner Content Start-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <h3 class="card-title"><span style="padding-right: 10px;margin-left: 10px;"><i class="fas fa-book" style="border-radius: 50%; padding: 15px; background: #3d807a; color: #ffffff;"></i></span>Total Found : 1000</h3>
                            </div>
                            <div class="row">
                                <div>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> Add Academic Calender</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#sl</th>
                                    <th>Session </th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <tbody>
                                    <?php $__currentLoopData = $calenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($calender->sessions->year); ?></td>
                                            <td><?php echo e($calender->name); ?></td>
                                            <td><?php echo e($calender->description); ?></td>
                                            <td><?php echo e($calender->start); ?></td>
                                            <td><?php echo e($calender->end); ?></td>
                                            <td><?php echo e($calender->sms_in); ?></td>
                                            <td><?php echo e($calender->sms_out); ?></td>
                                            <td>
                                                <?php echo Form::open(['method'=>'PUT','url'=>['academic-calender/status',$calender->id],'style'=>'display:inline']); ?>

                                                    <?php if($calender->status == 1): ?>
                                                        <?php echo e(Form::submit('Active',['class'=>'btn btn-success btn-sm'])); ?>

                                                    <?php else: ?>
                                                        <?php echo e(Form::submit('In Active',['class'=>'btn btn-danger btn-sm'])); ?>

                                                    <?php endif; ?>
                                                <?php echo Form::close(); ?>

                                            </td>
                                            <td>
                                                <a type="button" class="btn btn-warning btn-sm edit" value="<?php echo e($calender->id); ?>">Edit</a>
                                                <?php echo Form::open(['action'=>['Backend\AcademicCalenderController@destroy',$calender->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']); ?>

                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                <?php echo Form::close(); ?>

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
                    <h5 class="modal-title" id="exampleModalLabel">Add Calender</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <?php echo e(Form::open(['action'=>'Backend\AcademicCalenderController@store','method'=>'post','files'=>true])); ?>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Session :</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php echo e(Form::select('session_id',$repository->sessions(),null,['class'=>'form-control','id'=>'inputState'])); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Title</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" id=""  aria-describedby="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Short Description</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <textarea type="text" name="description" class="form-control" rows="3" id=""> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Start Date</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                
                                <?php echo e(Form::text('start',null,['class'=>'form-control datePicker'])); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">End Date</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                
                                <?php echo e(Form::text('end',null,['class'=>'form-control datePicker'])); ?>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">SMS In Time</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                
                                <?php echo e(Form::time('sms_in',null,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">SMS Out Time</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                
                                <?php echo e(Form::time('sms_out',null,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>
                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Save Academic Calender</button>
                    </div>
                    <?php echo e(Form::close()); ?>

                    

                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->



    <!-- ***/ Pop Up Model for Edit Session Class -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Fee Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo Form::open(['action'=>'Backend\AcademicCalenderController@update', 'method'=>'post']); ?>

                    <?php echo Form::hidden('id', null, ['id'=>'id']); ?>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Session :</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php echo e(Form::select('session_id',$repository->sessions(),null,['class'=>'form-control','id'=>'inputState'])); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Title</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control name" id=""  aria-describedby="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Short Description</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <textarea type="text" name="description" class="form-control" rows="3" id="description"> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">Start Date</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                
                                <?php echo e(Form::text('start',null,['class'=>'form-control datePicker start'])); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">End Date</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                
                                <?php echo e(Form::text('end',null,['class'=>'form-control datePicker end'])); ?>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">SMS In Time</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                
                                <?php echo e(Form::time('sms_in',null,['class'=>'form-control sms_in'])); ?>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label" style="font-weight: 500; text-align: right">SMS Out Time</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                
                                <?php echo e(Form::time('sms_out',null,['class'=>'form-control sms_out'])); ?>

                            </div>
                        </div>
                    </div>
                    <div style="float: right">
                        <button type="submit" class="btn btn-warning  btn-sm" > <i class="fas fa-plus-circle"></i> Update Academic Calender</button>
                    </div>

                    <?php echo Form::close(); ?>


                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->

<?php $__env->stopSection(); ?>
<!--/Image page inner Content End***-->

<!-- *** External CSS File-->
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/imageupload.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/datepicker3.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/timepicker/bootstrap-timepicker.min.css')); ?>">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<?php $__env->stopSection(); ?>

<!-- *** External JS File-->
<?php $__env->startSection('plugin'); ?>
    <script src= "<?php echo e(asset('assets/js/bootstrap-datepicker.min.js')); ?>"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo e(asset('plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>
        $(document).on('click','.edit',function () {
            $('#edit').modal('show');
            var id = $(this).attr('value');
            //console.log(id);
            $.ajax({
                method  : 'post',
                url     :  '<?php echo e(url('admin/academic-calender/edit')); ?>',
                data    :   {id:id,"_token":"<?php echo e(csrf_token()); ?>"},
                dataType : 'json',
                success:function (response) {
                    console.log(response);
                    $("#id").val(response.id);
                    $(".name").val(response.name);
                    $("#description").val(response.description);
                    $(".start").val(response.start);
                    $(".end").val(response.end);
                    $(".sms_in").val(response.sms_in);
                    $(".sms_out").val(response.sms_out);
                },
                erorr:function (err) {
                    console.log(err);
                }
            });
        });
        
        
        $(document).ready(function() {
            $('.datePicker')
                .datepicker({
                    format: 'yyyy-mm-dd'
                });

            $('.timepicker').timepicker({
                timeFormat: 'h:mm p',

            })
        });

        function confirmDelete(){
            var x = confirm('Are you sure you want delete this calender schedule?');
            return !!x;
        }
    </script>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/settings/academic_calender.blade.php ENDPATH**/ ?>
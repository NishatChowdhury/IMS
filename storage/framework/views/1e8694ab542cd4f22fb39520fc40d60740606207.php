<?php $__env->startSection('title','Institution Mgnt | Academic Classes'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Classes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Institution Mgnt</a></li>
                        <li class="breadcrumb-item active">Classes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php if(session('status')): ?>
                        <div class="alert alert-warning">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header" style="border-bottom: none !important;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="dec-block">
                                        <div class="ec-block-icon" style="float:left;margin-right:6px;height: 50px; width:50px; color: #ffffff; background-color: #00AAAA; border-radius: 50%;" >
                                            <i class="far fa-check-circle fa-2x" style="padding: 9px;"></i>
                                        </div>
                                        <div class="dec-block-dec" style="float:left;">
                                            <h5 style="margin-bottom: 0px;">Total Found</h5>
                                            <p><?php echo e($classes->count()); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: left;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px;"> <i class="fas fa-plus-circle"></i> New</button>
                                    </div>
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> </button>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#schedule" data-whatever="@mdo"  style="margin-top: 10px; margin-left: 10px; float: right !important;"> <i class="fas fa-plus-circle"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Class Name</th>
                                    <th>Students</th>
                                    <th>Subjects</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php ($i = 0); ?>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($class->id); ?></td>
                                        <td>
                                            <span class="badge badge-primary"><?php echo e($class->academicClasses->name ?? ''); ?></span>
                                            <span class="badge badge-secondary"><?php echo e($class->section->name ?? ''); ?></span>
                                            <span class="badge badge-dark"><?php echo e($class->group->name ?? ''); ?></span>

                                        </td>
                                        <td> <?php echo e($class->student_academic_count); ?> </td>
                                        <td><?php echo e($class->subjects->count()); ?></td>
                                        <td>
                                            <?php echo e(Form::open(['action'=>['Backend\InstitutionController@delete_SessionClass',$class->id],'method'=>'delete','onsubmit'=>'return confirmDelete()'])); ?>

                                            <a href="<?php echo e(action('Backend\StudentController@downloadBlank',$class->id)); ?>" role="button" class="btn btn-primary btn-sm" title="Download CSV"><i class="fas fa-file-download"></i></a>
                                            <a href="<?php echo e(action('Backend\StudentController@uploadStudent',$class->id)); ?>" role="button" class="btn btn-light btn-sm" title="Upload Student"><i class="fas fa-file-upload"></i></a>
                                            <a href="<?php echo e(action('Backend\InstitutionController@classSubjects',$class->id)); ?>" role="button" class="btn btn-info btn-sm" title="Assign Subject"><i class="fas fa-book"></i></a>
                                            <a href="<?php echo e(action('Backend\ScheduleController@index',$class->id)); ?>" role="button" class="btn btn-success btn-sm" title="Class Schedule"><i class="fas fa-clock"></i></a>
                                            <a href="<?php echo e(action('Backend\FeeCategoryController@list_fee_setup',$class->id)); ?>" class="btn btn-dark btn-sm"><i class="fas fa-funnel-dollar"></i></a>
                                            <a type="button" class="btn btn-warning btn-sm edit" value='<?php echo e($class->id); ?>' title="Edit"> <i class="fas fa-edit"></i></a>
                                            <button type="submit" disabled class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Academic Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo Form::open(['action'=>'Backend\InstitutionController@storeAcademicClass', 'method'=>'post']); ?>


                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Session</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <?php echo Form::select('session_id',$repository->sessions(), null, ['class'=>'form-control', 'placeholder'=>'Select Session','required']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Class</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <?php echo Form::select('class_id',$repository->classes(), null, ['class'=>'form-control', 'placeholder'=>'Select Class','required']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Section</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <?php echo Form::select('section_id',$repository->sections(), null, ['class'=>'form-control', 'placeholder'=>'Select Section']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Group</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <?php echo Form::select('group_id',$repository->groups(), null, ['class'=>'form-control', 'placeholder'=>'Select Group']); ?>

                            </div>
                        </div>
                    </div>
                    
                        
                        
                            
                                
                            
                        
                    

                    
                        
                        
                            
                                
                            
                        
                    


                    <div style="float: right">
                        <button type="submit" class="btn btn-success  btn-sm" > <i class="fas fa-plus-circle"></i> Add</button>
                    </div>
                    <?php echo Form::close(); ?>


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
                    <h5 class="modal-title" id="exampleModalLabel">Update Academic Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo Form::open(['action'=>'Backend\InstitutionController@updateAcademicClass', 'method'=>'post']); ?>

                    <?php echo Form::hidden('id', null, ['id'=>'id']); ?>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Session</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <?php echo Form::select('session_id',$repository->sessions(), null, ['class'=>'form-control session_id', 'placeholder'=>'Select Session','required']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Class</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <?php echo Form::select('class_id',$repository->classes(), null, ['class'=>'form-control class_id', 'placeholder'=>'Select Class','required']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Section</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <?php echo Form::select('section_id',$repository->sections(), null, ['class'=>'form-control section_id', 'placeholder'=>'Select Section']); ?>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="font-weight: 500; text-align: right">Group</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <?php echo Form::select('group_id',$repository->groups(), null, ['class'=>'form-control group_id', 'placeholder'=>'Select Group']); ?>

                            </div>
                        </div>
                    </div>


                    <div style="float: right">
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="fas fa-plus-circle"></i> Update
                        </button>
                    </div>
                    <?php echo Form::close(); ?>


                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- ***/ Pop Up Model for button End-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).on('click', '.edit', function () {
            $("#edit").modal("show");
            var id = $(this).attr('value');

            $.ajax({
                method:"post",
                url:"<?php echo e(url('admin/institution/edit-AcademicClass')); ?>",
                data:{id:id,"_token":"<?php echo e(csrf_token()); ?>"},
                dataType:"json",
                success:function(response){
                    console.log(response);
                    $("#id").val(response.id);
                    $(".session_id").val(response.session_id);
                    $(".class_id").val(response.class_id);
                    $(".section_id").val(response.section_id);
                    $(".group_id").val(response.group_id);

                },
                error:function(err){
                    console.log(err);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/institution/academicClasses.blade.php ENDPATH**/ ?>
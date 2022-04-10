<?php $__env->startSection('title','Student List'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Students</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- /.Search-panel -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="card" style="margin: 10px;">
                        <!-- form start -->
                        <?php echo e(Form::open(['action'=>'Backend\StudentController@index','role'=>'form','method'=>'get'])); ?>

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <label for="">Student ID</label>
                                    <div class="input-group">
                                        <?php echo e(Form::text('studentId',null,['class'=>'form-control','placeholder'=>'Student ID'])); ?>

                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Name</label>
                                    <div class="input-group">
                                        <?php echo e(Form::text('name',null,['class'=>'form-control','placeholder'=>'Name'])); ?>

                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Session</label>
                                    <div class="input-group">
                                        <?php echo e(Form::select('session_id',$repository->sessions(),null,['class'=>'form-control','placeholder'=>'Select Session'])); ?>

                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Class</label>
                                    <div class="input-group">
                                        <?php echo e(Form::select('class_id',$repository->classes(),null,['class'=>'form-control','placeholder'=>'Select Class'])); ?>

                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Section</label>
                                    <div class="input-group">
                                        <?php echo e(Form::select('section_id',$repository->sections(),null,['class'=>'form-control','placeholder'=>'Select Section'])); ?>

                                    </div>
                                </div>
                                <div class="col">
                                    <label for="">Group</label>
                                    <div class="input-group">
                                        <?php echo e(Form::select('group_id',$repository->groups(),null,['class'=>'form-control','placeholder'=>'Select Group'])); ?>

                                    </div>
                                </div>

                                <div class="col-1" style="padding-top: 32px;">
                                    <div class="input-group">
                                        <button  style="padding: 6px 20px;" type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.Search-panel -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Total Found : <?php echo e($students->total()); ?></h3>
                        <div class="card-tools">
                            <a href="<?php echo e(route('student.add')); ?>" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>
                            <a href="<?php echo e(route('csv')); ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> CSV</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Student</th>
                                <th>Mobile</th>
                                <th>Father/Mother</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($student->studentId); ?></td>
                                    <td><?php echo e($student->name); ?>

                                    <?php if($student->status == 2): ?>
                                        <span class="badge badge-danger">Drop Out</span>
                                    <?php endif; ?>
                                    </td>
                                    <td> <?php echo e($student->mobile); ?></td>
                                    <td>    <?php echo e($student->father ? $student->father->f_name : ''); ?> ||<br>
                                            <?php echo e($student->mother ? $student->mother->m_name : ''); ?>


                                           
                                    </td>
                                    <td><img src="<?php echo e(asset('storage/uploads/students/')); ?>/<?php echo e($student->image); ?>" height="100" alt=""></td>
                                    <td>
                                        <a href="<?php echo e(action('Backend\StudentController@studentProfile',$student->id)); ?>" role="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="<?php echo e(action('Backend\StudentController@edit',$student->id)); ?>" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo e(action('Backend\StudentController@subjects',$student->id)); ?>" role="button" class="btn btn-info btn-sm"><i class="fas fa-book"></i></a>
                                        <a href="<?php echo e(action('Backend\StudentController@dropOut',$student->id)); ?>" role="button" class="btn btn-danger btn-sm" title="DROPOUT"><i class="fas fa-sign-out-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <?php echo e($students->appends(Request::except('page'))->links()); ?>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/student/list.blade.php ENDPATH**/ ?>
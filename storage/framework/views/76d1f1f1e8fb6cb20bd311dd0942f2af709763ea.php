<?php $__env->startSection('title','Online Admission'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(__('Online Admission')); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo e(__('Admission')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('Create')); ?></li>
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
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="">
                                        <button type="button" onclick="createOnlineType()"  class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <i class="fas fa-plus-circle"></i>
                                            <?php echo e(__('New')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="alert alert-danger">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th><?php echo e(__('Admission Type')); ?></th>
                                    <th><?php echo e(__('Session')); ?></th>
                                    <th><?php echo e(__('Class')); ?></th>
                                    <th><?php echo e(__('Group')); ?></th>
                                    <th><?php echo e(__('Start')); ?></th>
                                    <th><?php echo e(__('End')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $onlineAdmissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onlineAdmission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($onlineAdmission->type == 1 ? 'School' : 'College'); ?></td>
                                        <td><?php echo e($onlineAdmission->session_id ? $onlineAdmission->sessions->year : 'N/A'); ?></td>
                                        <td><?php echo e($onlineAdmission->class_id ? $onlineAdmission->classes->name : 'N/A'); ?></td>
                                        <td><?php echo e($onlineAdmission->group_id ? $onlineAdmission->group->name : 'N/A'); ?></td>
                                        <td><?php echo e($onlineAdmission->start->format('d F Y')); ?></td>
                                        <td><?php echo e($onlineAdmission->end->format('d F Y')); ?></td>
                                        <td>
                                            <?php if($onlineAdmission->status == 1): ?>
                                                <span class="badge badge-primary">Active</span>
                                            <?php else: ?>
                                                <span class="badge badge-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('onlineStepEdit', $onlineAdmission->id)); ?>"  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-sm-12 col-md-9">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">First</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Last</a></li>
                                        </ul>
                                    </nav>
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Online Application Set</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="ChnageUrl" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body row">
                        <div class="form-group col-12">
                            <label for=""><?php echo e(__('Admission Type')); ?></label>
                            <select name="type" class="form-control">
                                <option>--Select Class--</option>
                                <option value="1">School</option>
                                <option value="2">College</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Session Name</label>
                            <select name="session_id" id="session_id" class="form-control">
                                <option value="">--Select Session--</option>
                                <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($session->id); ?>"><?php echo e($session->year); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Class Name</label>
                            <select name="class_id" id="class_id" class="form-control">
                                <option value="">--Select Class--</option>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Group Name</label>
                            <select name="group_id" id="group_id" class="form-control">
                                <option value="">--Select Class--</option>
                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($group->id); ?>"><?php echo e($group->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Starting Date</label>
                            <input type="date" name="start" id="start" class="form-control">
                        </div>

                        <div class="form-group col-6">
                            <label for="">Ending Date</label>
                            <input type="date" name="end" id="end" class="form-control">
                        </div>
                        <div class="form-group col-6" id="statusCheck">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" value="1" name="status" class="custom-control-input" id="customSwitch1">
                                <label class="custom-control-label" for="customSwitch1">Status</label>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="onlineId" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>

        // create action url here
        function createOnlineType(){
            let Createaction = "<?php echo e(route('online.typeSave')); ?>";
            $("#ChnageUrl").attr("action", Createaction);
            $("#statusCheck").hide();
            $('#class_id').val('');
            $('#group_id').val('');
            $('#start').val('');
            $('#end').val('');
            $('#onlineId').val('');
            $('#customSwitch1').val('');
        }

        // update action url here

        function getData($id){
            let academicYear = $id;
            let action = "<?php echo e(route('online.typeUpdate')); ?>";

            $.ajax({
                url:"<?php echo e(url('admin/load_online_adminsion_id')); ?>",
                type:'GET',
                data:{academicYear:academicYear},
                success:function (data) {
                    // console.log(data.end.toLocaleDateString());
                    $('#class_id').val(data.class_id);
                    $('#group_id').val(data.group_id);
                    $('#start').val(data.start);
                    $('#end').val(data.end);
                    $('#onlineId').val(data.id);
                    // $('#customSwitch1').val(data.status);

                    $("#statusCheck").show();
                    if(data.status == 1){
                        $('#customSwitch1').prop('checked', true);
                        $('#customSwitch1').val(1)
                    }else{
                        $('#customSwitch1').prop('checked', false);
                    }



                    // edit action url show
                    $("#ChnageUrl").attr("action", action);
                }
            });
        }
        // function checkID(){
        //             if ($('#customSwitch1').is(':checked')) {
        //             $('input[type=checkbox]').prop('checked', true);
        //             $('#customSwitch1').val(1)
        //             }else{
        //                 $('input[type=checkbox]').prop('checked', false);
        //                 $('#customSwitch1').val(0);

        //             }
        //         }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/admission/onlineAdminssion.blade.php ENDPATH**/ ?>
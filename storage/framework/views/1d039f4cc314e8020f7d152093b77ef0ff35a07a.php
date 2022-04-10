<?php $__env->startSection('title','Inner Page'); ?>

<?php $__env->startSection('content'); ?>

    <div class="py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-white">
                    <h2></h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end bg-transparent">
                        <li class="breadcrumb-item">
                            <a href="#"><?php echo e(__('Home')); ?></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#"> <?php echo e(__('Result')); ?> </a>
                        </li>
                        <li class="breadcrumb-item"><?php echo e(__('School Admission')); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="padding-y-100 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                    </div>
                    <?php if($message = Session::get('status')): ?>
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo e($message); ?></strong>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="table-responsive my-4">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" class="font-weight-semiBold"><?php echo e(__('Name')); ?></th>
                                    <th class="text-center"><?php echo e(__('Expire Date')); ?></th>
                                    <th class="text-center"><?php echo e(__('Action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $admissionStep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($admission->classes->name); ?> <?php echo e($admission->group_id ? $admission->group->name : ''); ?></td>
                                        <td class="text-center">
                                            <?php echo e(__('From')); ?> <b><?php echo e($admission->start->format('d F Y')); ?></b> <?php echo e(__('To')); ?>

                                            <b><?php echo e($admission->end->format('d F Y')); ?></b>
                                        </td>
                                        <td class="text-center">
                                            <?php if($admission->end->endOfDay() > now()): ?>
                                                <?php if($admission->type == 1): ?>
                                                    <a href="<?php echo e(url('/online-apply')); ?>/<?php echo e($admission->id); ?>" class="btn btn-link"><?php echo e(__('Apply Now')); ?></a>
                                                <?php else: ?>
                                                <a href="<?php echo e(url('/online-apply-college')); ?>" class="btn btn-link">Apply View</a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span class="text-danger"><?php echo e(__('Expired')); ?></span>
                                            <?php endif; ?>
                                           
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><?php echo e(__('View Application')); ?></a>
                    </div>
                </div>
            </div> <!-- END row-->
        </div> <!-- END container-->
    </section>
    

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download Your Application Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

               <form id="downloadForm" method="get">
                   <?php echo csrf_field(); ?>
                   <div class="modal-body row">
                    <div class="form-group col-12">
                        <label for="">Application ID</label>
                        <input type="text" id="applcationID" name="id" class="form-control" placeholder="Enter Application ID">
                        <hr>
                        <button type="submit"  class="btn btn-primary btn-sm">Download</button>
                    </div>
                </div>
               </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>

    $('#applcationID').keyup(function(){
        let id = $('#applcationID').val();
         let action = "<?php echo e(url('download-school-pdf')); ?>/"+id;
         $('#downloadForm').attr('action', action);
    });


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front-inner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/pages/apply-school.blade.php ENDPATH**/ ?>
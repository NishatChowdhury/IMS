<section class="pt-5">
    <div class="container">
        <div class="row align-items-center" style="background: #cfe6e78c;padding-bottom: 20px;">
            <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($msg->alias=='principal'): ?>
                    <div class="col-md-4 mt-3">
                        
                        
                        <img src="<?php echo e(asset('uploads/message/'.$msg->image)); ?>" width="350px" height="350px" alt="">
                    </div>
                    <div class="col-md-6">
                        <h2>
                            <small class="text-primary d-block">
                                Principal
                            </small>
                            Message
                        </h2>
                        <?php echo Str::limit($msg->body, 800); ?>

                        <p type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#principalModal" data-whatever="@mdo" > More..</p>
                    </div>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<div class="modal fade" id="principalModal" tabindex="-1" role="dialog" aria-labelledby="principalModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="left:-150px; width: 1000px !important; padding: 0px 50px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($message->alias == 'principal'): ?>
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="">
                                        <img style="margin-top: 10px;float: left;"  height="200px"  width="200px" src="<?php echo e(asset('uploads/message/'.$message->image)); ?>" alt="">
                                    </div>
                                    <div class="">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/front/principal.blade.php ENDPATH**/ ?>
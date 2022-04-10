<?php $__env->startSection('title','Student List'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Theme</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Themes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger">
                    <p>It will avilable new version</p>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Total Found : <?php echo e($themes->total()); ?></h3>
                        <div class="card-tools">
                            <a href="<?php echo e(route('user.add')); ?>" class="btn btn-success btn-sm" style="padding-top: 5px; margin-left: 60px;"><i class="fas fa-plus-circle"></i> New</a>
                            <a href="<?php echo e(\Illuminate\Support\Facades\Request::fullUrlWithQuery(['csv' => 'csv'])); ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-cloud-download-alt"></i> CSV</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Color Palette</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo e($theme->current ? 'text-bold' : ''); ?>">
                                    <td><?php echo e($theme->id); ?></td>
                                    <td>
                                        <?php echo e($theme->name); ?>

                                        <?php if($theme->id === 1): ?> <i class="text-sm" style="color:lightslategray">(default)</i> <?php endif; ?>
                                        <?php if($theme->current): ?>
                                            <i class="far fa-check-circle" style="color:lightslategray"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span style="float:left;background: <?php echo e($theme->top_bar_background); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->top_bar_color); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->header_background); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->header_color); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->menu_background); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->menu_color); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->submenu_background); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->submenu_color); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->inner_background); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->inner_color); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->footer_background); ?>">&nbsp;</span>
                                        <span style="float:left;background: <?php echo e($theme->footer_color); ?>">&nbsp;</span>
                                    </td>
                                    <td><?php echo e($theme->created_at); ?></td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm"><i class="fas fa-user-check"></i></a>
                                        <a href="<?php echo e(action('Backend\ThemeController@edit',$theme->id)); ?>" role="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo e(action('Backend\ThemeController@destroy',$theme->id)); ?>" role="button" class="btn btn-danger btn-sm" title="Remove"><i class="fas fa-sign-out-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <?php echo e($themes->appends(Request::except('page'))->links()); ?>

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

<?php echo $__env->make('layouts.fixed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/admin/theme/index.blade.php ENDPATH**/ ?>
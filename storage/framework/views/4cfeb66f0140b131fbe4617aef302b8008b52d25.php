
<?php $__env->startComponent('mail::message'); ?>

# Application ID <?php echo e($details['id']); ?>

 
<?php echo e($details['name']); ?> your application successfully done!
 

<?php $__env->startComponent('mail::button', ['url' => $details['url']]); ?>
Download Application Form
<?php echo $__env->renderComponent(); ?>
 
Thanks,<br>
<?php echo e(config('app.name')); ?>



<?php echo $__env->renderComponent(); ?><?php /**PATH /home/maynuddin/PhpstormProjects/wpschool/resources/views/emails/admission-mail.blade.php ENDPATH**/ ?>
<?php
        $is_admin = Auth::user()->admin;
        
?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><?php if( $is_admin ) echo "Admin "; ?>Dashboard</div>

                <div class="panel-body">
                <?php if(session('status')): ?>
    <div class="alert alert-warning">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
               
                    You are logged in!
                    <?php if( empty( $profile->id )): ?>
                    <div>You haven't created a profile yet! <a class="btn btn-link" href="<?php echo e(url('/profile/create')); ?>">Create one now</a></div>
                    <?php endif; ?>
                       <?php if( !empty( $is_admin )): ?>
                    <div>View Profiles:  <a class="btn btn-link" href="<?php echo e(url('/admin')); ?>">here</a></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
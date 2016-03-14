<?php $__env->startSection('content'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Profile # <?php echo e($profile->id); ?>

            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">                 
                        <tr><th>User id</th><td><?php echo e($profile->user->id); ?></td></tr>
                        <tr><th>Email</th><td><?php echo e($profile->user->email); ?></td></tr>
                        <tr><th>Created</th><td><?php echo e($profile->created_at); ?></td></tr>
                        <tr><th>User joined</th><td><?php echo e($profile->user->created_at); ?></td></tr>
                        <tr><th>Username</th><td><?php echo e($profile->username); ?></td></tr>
                        <tr><th> Real name</th><td><?php echo e($profile->user->name); ?></td></tr>
                        <tr><th>Description</th><td><?php echo e($profile->description); ?></td></tr>
                </table>
                    <div><a href="<?php echo e(url('/admin/')); ?>">Return to profile list</a></div>

            </div>

        </div>
            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>

    <?php if(count($profiles) > 0): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Active Profiles
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Username</th>
                        <th>Created</th>
                        <th>Email</th>
                        <th>View</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        <?php foreach($profiles as $profile ): ?>
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div><?php echo e($profile->username); ?></div>
                                </td>
                                <td class="table-text">
                                    <div><?php echo e($profile->created_at); ?></div>
                                </td>
                                <td class="table-text">
                                    <div><?php echo e($profile->user->email); ?></div>
                                </td>
                                <td>
                                     <div><a href="<?php echo e(url('/admin/view')); ?>/<?php echo e($profile->id); ?>">View</a></div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                         </table>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Manage Patients'); ?>
<?php $__env->startSection('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">All Patients</h2>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-sm text-blue-600 hover:underline">← Back to Dashboard</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Phone</th>
                <th class="p-3 text-left">Date of Birth</th>
                <th class="p-3 text-left">Sessions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3 font-medium"><?php echo e($p->first_name); ?> <?php echo e($p->last_name); ?></td>
                <td class="p-3"><?php echo e($p->email); ?></td>
                <td class="p-3"><?php echo e($p->phone ?? '—'); ?></td>
                <td class="p-3"><?php echo e($p->date_of_birth ?? '—'); ?></td>
                <td class="p-3">
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                        <?php echo e($p->sessions->count()); ?>

                    </span>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" class="p-4 text-center text-gray-500">No patients found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/admin/patients.blade.php ENDPATH**/ ?>
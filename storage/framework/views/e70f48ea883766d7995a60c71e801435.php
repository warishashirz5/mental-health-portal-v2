
<?php $__env->startSection('title', 'Manage Therapists'); ?>
<?php $__env->startSection('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">All Therapists</h2>
    <div class="flex gap-3">
        <a href="<?php echo e(route('admin.therapists.create')); ?>"
            class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900 text-sm font-semibold">
            + Add Therapist
        </a>
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-sm text-blue-600 hover:underline self-center">← Back</a>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Phone</th>
                <th class="p-3 text-left">License No</th>
                <th class="p-3 text-left">Specializations</th>
                <th class="p-3 text-left">Sessions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $therapists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3 font-medium">Dr. <?php echo e($t->first_name); ?> <?php echo e($t->last_name); ?></td>
                <td class="p-3"><?php echo e($t->email); ?></td>
                <td class="p-3"><?php echo e($t->phone ?? '—'); ?></td>
                <td class="p-3"><?php echo e($t->license_no); ?></td>
                <td class="p-3">
                    <?php $__currentLoopData = $t->specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="bg-teal-100 text-teal-700 px-2 py-1 rounded text-xs mr-1">
                        <?php echo e($spec->specialization_name); ?>

                    </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td class="p-3">
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                        <?php echo e($t->sessions->count()); ?>

                    </span>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="6" class="p-4 text-center text-gray-500">No therapists found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/admin/therapists.blade.php ENDPATH**/ ?>
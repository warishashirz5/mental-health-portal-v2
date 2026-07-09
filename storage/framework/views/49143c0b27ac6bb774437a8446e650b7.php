
<?php $__env->startSection('title', 'My Sessions'); ?>
<?php $__env->startSection('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">Patient Sessions</h2>
    <a href="<?php echo e(route('therapist.dashboard')); ?>" class="text-sm text-blue-600 hover:underline">← Back to Dashboard</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-3 text-left">Patient</th>
                <th class="p-3 text-left">Date</th>
                <th class="p-3 text-left">Time</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3 font-medium"><?php echo e($s->patient->first_name); ?> <?php echo e($s->patient->last_name); ?></td>
                <td class="p-3"><?php echo e($s->session_date); ?></td>
                <td class="p-3"><?php echo e($s->session_time); ?></td>
                <td class="p-3">
                    <span class="px-2 py-1 rounded text-xs font-medium
                        <?php echo e($s->status === 'scheduled' ? 'bg-green-100 text-green-700' : ''); ?>

                        <?php echo e($s->status === 'cancelled' ? 'bg-red-100 text-red-700' : ''); ?>

                        <?php echo e($s->status === 'completed' ? 'bg-blue-100 text-blue-700' : ''); ?>">
                        <?php echo e(ucfirst($s->status)); ?>

                    </span>
                </td>
                <td class="p-3">
                    <a href="<?php echo e(route('therapist.sessions.notes', $s->session_id)); ?>"
                        class="text-blue-600 hover:underline text-xs font-medium mr-3">Notes</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" class="p-4 text-center text-gray-500">No sessions found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/therapist/sessions.blade.php ENDPATH**/ ?>
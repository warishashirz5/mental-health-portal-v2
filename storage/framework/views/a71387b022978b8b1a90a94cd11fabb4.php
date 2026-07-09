
<?php $__env->startSection('title', 'My Availability'); ?>
<?php $__env->startSection('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">My Availability</h2>
    <a href="<?php echo e(route('therapist.dashboard')); ?>" class="text-sm text-blue-600 hover:underline">← Back to Dashboard</a>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-8">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Add Available Slot</h3>
    <form method="POST" action="<?php echo e(route('therapist.availability.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                <input type="date" name="availability_date"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-teal-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
                <input type="time" name="start_time"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-teal-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">End Time</label>
                <input type="time" name="end_time"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-teal-500" required>
            </div>
        </div>
        <button type="submit" class="mt-4 bg-teal-700 text-white px-6 py-2 rounded hover:bg-teal-800 font-semibold">
            Save Availability
        </button>
    </form>
</div>

<h3 class="text-xl font-bold text-blue-900 mb-4">My Schedule</h3>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-teal-700 text-white">
            <tr>
                <th class="p-3 text-left">Date</th>
                <th class="p-3 text-left">Start Time</th>
                <th class="p-3 text-left">End Time</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $availabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?php echo e($a->availability_date); ?></td>
                <td class="p-3"><?php echo e($a->start_time); ?></td>
                <td class="p-3"><?php echo e($a->end_time); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="3" class="p-4 text-center text-gray-500">No availability set yet.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/therapist/availability.blade.php ENDPATH**/ ?>
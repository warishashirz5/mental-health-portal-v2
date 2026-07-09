
<?php $__env->startSection('title', 'My Sessions'); ?>
<?php $__env->startSection('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">Book a Session</h2>
    <a href="<?php echo e(route('patient.dashboard')); ?>" class="text-sm text-blue-600 hover:underline">← Back to Dashboard</a>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-8">
    <form method="POST" action="<?php echo e(route('patient.sessions.book')); ?>">
        <?php echo csrf_field(); ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Select Therapist</label>
                <select name="therapist_id" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Choose Therapist</option>
                    <?php $__currentLoopData = $therapists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($t->therapist_id); ?>">
                        Dr. <?php echo e($t->first_name); ?> <?php echo e($t->last_name); ?>

                        <?php if($t->specializations->count()): ?>
                            — <?php echo e($t->specializations->pluck('specialization_name')->join(', ')); ?>

                        <?php endif; ?>
                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Session Date</label>
                <input type="date" name="session_date" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Session Time</label>
                <input type="time" name="session_time" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>
        <button type="submit" class="mt-4 bg-blue-800 text-white px-6 py-2 rounded hover:bg-blue-900 font-semibold">
            Book Session
        </button>
    </form>
</div>

<h3 class="text-xl font-bold text-blue-900 mb-4">My Sessions</h3>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-3 text-left">Date</th>
                <th class="p-3 text-left">Time</th>
                <th class="p-3 text-left">Therapist</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?php echo e($s->session_date); ?></td>
                <td class="p-3"><?php echo e($s->session_time); ?></td>
                <td class="p-3">Dr. <?php echo e($s->therapist->first_name); ?> <?php echo e($s->therapist->last_name); ?></td>
                <td class="p-3">
                    <span class="px-2 py-1 rounded text-xs font-medium
                        <?php echo e($s->status === 'scheduled' ? 'bg-green-100 text-green-700' : ''); ?>

                        <?php echo e($s->status === 'cancelled' ? 'bg-red-100 text-red-700' : ''); ?>

                        <?php echo e($s->status === 'completed' ? 'bg-blue-100 text-blue-700' : ''); ?>">
                        <?php echo e(ucfirst($s->status)); ?>

                    </span>
                </td>
                <td class="p-3">
                    <?php if($s->status === 'scheduled'): ?>
                    <form method="POST" action="<?php echo e(route('patient.sessions.cancel', $s->session_id)); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="text-red-600 hover:underline text-xs font-medium">Cancel</button>
                    </form>
                    <?php else: ?>
                    <span class="text-gray-400 text-xs">—</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5" class="p-4 text-center text-gray-500">No sessions found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/patient/sessions.blade.php ENDPATH**/ ?>
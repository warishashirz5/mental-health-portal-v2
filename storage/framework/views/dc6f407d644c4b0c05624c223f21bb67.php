
<?php $__env->startSection('title', 'Patient Dashboard'); ?>
<?php $__env->startSection('content'); ?>

<div class="mb-6">
    <h2 class="text-2xl font-bold text-blue-900">Patient Dashboard</h2>
    <p class="text-gray-600">Welcome back, <?php echo e(session('auth_user.name')); ?>!</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <a href="<?php echo e(route('patient.sessions')); ?>" class="bg-blue-800 text-white p-6 rounded-lg shadow hover:bg-blue-900">
        <h3 class="text-lg font-bold mb-1">📅 My Sessions</h3>
        <p class="text-sm opacity-80">Book or view your therapy sessions</p>
    </a>
    <a href="<?php echo e(route('patient.mood')); ?>" class="bg-teal-700 text-white p-6 rounded-lg shadow hover:bg-teal-800">
        <h3 class="text-lg font-bold mb-1">😊 Mood Tracker</h3>
        <p class="text-sm opacity-80">Log and track your daily mood</p>
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-blue-900 mb-4">Upcoming Sessions</h3>
        <?php $__empty_1 = true; $__currentLoopData = $upcomingSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="border-b py-3">
            <p class="font-medium">Dr. <?php echo e($s->therapist->first_name); ?> <?php echo e($s->therapist->last_name); ?></p>
            <p class="text-sm text-gray-500"><?php echo e($s->session_date); ?> at <?php echo e($s->session_time); ?></p>
            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded"><?php echo e($s->status); ?></span>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500 text-sm">No upcoming sessions.</p>
        <?php endif; ?>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-blue-900 mb-4">Recent Mood Logs</h3>
        <?php $__empty_1 = true; $__currentLoopData = $recentMoods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mood): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="border-b py-3">
            <p class="font-medium capitalize"><?php echo e($mood->mood_level); ?></p>
            <p class="text-sm text-gray-500"><?php echo e($mood->log_date); ?> — <?php echo e($mood->notes); ?></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500 text-sm">No mood logs yet.</p>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/patient/dashboard.blade.php ENDPATH**/ ?>
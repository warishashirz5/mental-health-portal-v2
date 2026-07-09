<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Portal — <?php echo $__env->yieldContent('title'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-blue-900 text-white px-6 py-4 flex justify-between items-center shadow">
        <span class="font-bold text-xl">🧠 Mental Health Portal</span>
        <?php if(session('auth_user')): ?>
        <div class="flex items-center gap-4">
            <span class="text-sm">Welcome, <?php echo e(session('auth_user.name')); ?></span>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button class="bg-red-500 px-4 py-1 rounded hover:bg-red-600 text-sm">Logout</button>
            </form>
        </div>
        <?php endif; ?>
    </nav>

    <main class="max-w-6xl mx-auto mt-8 px-4 pb-12">
        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-800 p-3 mb-4 rounded">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-800 p-3 mb-4 rounded">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="bg-red-100 border border-red-400 text-red-800 p-3 mb-4 rounded">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>
</html><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/layouts/app.blade.php ENDPATH**/ ?>
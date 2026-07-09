
<?php $__env->startSection('title', 'Add Admin'); ?>
<?php $__env->startSection('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">Add New Admin</h2>
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-sm text-blue-600 hover:underline">← Back to Dashboard</a>
</div>

<div class="bg-white rounded-lg shadow p-8 max-w-md">
    <form method="POST" action="<?php echo e(route('admin.admins.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password"
                class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation"
                class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
        </div>
        <button type="submit"
            class="w-full bg-blue-800 text-white py-2 rounded hover:bg-blue-900 font-semibold">
            Add Admin
        </button>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/admin/admins_create.blade.php ENDPATH**/ ?>
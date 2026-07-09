
<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>

<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow mt-16">
    <h2 class="text-2xl font-bold text-blue-900 mb-6 text-center">Login to Portal</h2>

    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Login As</label>
            <select name="role" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Select Role</option>
                <option value="patient">Patient</option>
                <option value="therapist">Therapist</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password"
                class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <button type="submit"
            class="w-full bg-blue-800 text-white py-2 rounded hover:bg-blue-900 font-semibold">
            Login
        </button>
    </form>
<div class="mt-4 space-y-2 text-center text-sm text-gray-600">
    <p>
        New here?
        <a href="<?php echo e(route('register')); ?>" class="text-blue-600 hover:underline">Create an account</a>
    </p>
    <p class="text-xs text-gray-400">
        Patients, therapists, and admins can all register on the same page.
    </p>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/auth/login.blade.php ENDPATH**/ ?>
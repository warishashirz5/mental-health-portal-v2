
<?php $__env->startSection('title', 'Add Therapist'); ?>
<?php $__env->startSection('content'); ?>

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">Add New Therapist</h2>
    <a href="<?php echo e(route('admin.therapists')); ?>" class="text-sm text-blue-600 hover:underline">← Back to Therapists</a>
</div>

<div class="bg-white rounded-lg shadow p-8 max-w-2xl">
    <form method="POST" action="<?php echo e(route('admin.therapists.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                <input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                <input type="text" name="last_name" value="<?php echo e(old('last_name')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                <input type="text" name="phone" value="<?php echo e(old('phone')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">License No</label>
                <input type="text" name="license_no" value="<?php echo e(old('license_no')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>

        <?php if($specializations->count()): ?>
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Specializations</label>
            <div class="grid grid-cols-2 gap-2">
                <?php $__currentLoopData = $specializations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="flex items-center gap-2 text-sm">
                    <input type="checkbox" name="specializations[]" value="<?php echo e($spec->specialization_id); ?>"
                        class="rounded border-gray-300">
                    <?php echo e($spec->specialization_name); ?>

                </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>

        <button type="submit"
            class="mt-6 bg-blue-800 text-white px-8 py-2 rounded hover:bg-blue-900 font-semibold">
            Add Therapist
        </button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/admin/therapists_create.blade.php ENDPATH**/ ?>
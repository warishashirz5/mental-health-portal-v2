
<?php $__env->startSection('title', 'Register'); ?>
<?php $__env->startSection('content'); ?>

<div class="max-w-3xl mx-auto mt-6">

    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-blue-900">Create Your Account</h2>
        <p class="text-gray-500 mt-2">Choose the account type that fits you, then fill in your details.</p>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8" id="role-selector">
        <button type="button" data-role="patient"
            class="role-card group text-left bg-white border-2 border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md hover:border-blue-400 transition-all">
            <div class="text-3xl mb-2">🧑‍⚕️</div>
            <div class="font-semibold text-gray-800 group-[.active]:text-blue-900">Patient</div>
            <p class="text-xs text-gray-500 mt-1">Book sessions, log your mood, track progress.</p>
        </button>

        <button type="button" data-role="therapist"
            class="role-card group text-left bg-white border-2 border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md hover:border-blue-400 transition-all">
            <div class="text-3xl mb-2">🩺</div>
            <div class="font-semibold text-gray-800 group-[.active]:text-blue-900">Therapist</div>
            <p class="text-xs text-gray-500 mt-1">Manage sessions, notes, and availability.</p>
        </button>

        <button type="button" data-role="admin"
            class="role-card group text-left bg-white border-2 border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md hover:border-blue-400 transition-all">
            <div class="text-3xl mb-2">🛡️</div>
            <div class="font-semibold text-gray-800 group-[.active]:text-blue-900">Admin</div>
            <p class="text-xs text-gray-500 mt-1">Oversee patients, therapists, and sessions.</p>
        </button>
    </div>

    <div class="bg-white p-8 rounded-xl shadow-lg">
        <form method="POST" action="<?php echo e(route('register')); ?>" id="register-form">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="role" id="role-input" value="<?php echo e(old('role', 'patient')); ?>">

            <h3 class="text-xl font-bold text-blue-900 mb-6" id="form-heading">Patient Registration</h3>

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 field-group field-patient field-therapist">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" name="last_name" value="<?php echo e(old('last_name')); ?>"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            
            <div class="mb-4 field-group field-admin" style="display:none">
                <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4 mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4 field-group field-patient field-therapist">
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                <input type="text" name="phone" value="<?php echo e(old('phone')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            
            <div class="mb-4 field-group field-patient">
                <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                <input type="date" name="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            
            <div class="mb-4 field-group field-therapist" style="display:none">
                <label class="block text-sm font-medium text-gray-700 mb-1">License Number</label>
                <input type="text" name="license_no" value="<?php echo e(old('license_no')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-xs text-gray-400 mt-1">Your professional licensing/registration number.</p>
            </div>

            
            <div class="mb-4 field-group field-admin" style="display:none">
                <label class="block text-sm font-medium text-gray-700 mb-1">Admin Access Code</label>
                <input type="text" name="access_code" value="<?php echo e(old('access_code')); ?>"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-xs text-gray-400 mt-1">Ask an existing administrator for the access code.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <button type="submit"
                class="w-full mt-6 bg-blue-800 text-white py-2.5 rounded-lg hover:bg-blue-900 font-semibold transition-colors" id="submit-btn">
                Register as Patient
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Already have an account? <a href="<?php echo e(route('login')); ?>" class="text-blue-600 hover:underline">Login here</a>
        </p>
    </div>
</div>

<script>
(function () {
    const roleCards   = document.querySelectorAll('.role-card');
    const roleInput   = document.getElementById('role-input');
    const heading     = document.getElementById('form-heading');
    const submitBtn   = document.getElementById('submit-btn');
    const labels      = { patient: 'Patient', therapist: 'Therapist', admin: 'Admin' };

    function setRole(role) {
        roleInput.value = role;

        roleCards.forEach(card => {
            const active = card.dataset.role === role;
            card.classList.toggle('active', active);
            card.classList.toggle('border-blue-600', active);
            card.classList.toggle('ring-2', active);
            card.classList.toggle('ring-blue-200', active);
            card.classList.toggle('bg-blue-50', active);
        });

        document.querySelectorAll('.field-group').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.field-' + role).forEach(el => el.style.display = '');

        heading.textContent = labels[role] + ' Registration';
        submitBtn.textContent = 'Register as ' + labels[role];
    }

    roleCards.forEach(card => card.addEventListener('click', () => setRole(card.dataset.role)));

    // preselect via ?role=therapist / ?role=admin, or previous validation error, default patient
    const params = new URLSearchParams(window.location.search);
    const initialRole = '<?php echo e(old('role')); ?>' || params.get('role') || 'patient';
    setRole(['patient', 'therapist', 'admin'].includes(initialRole) ? initialRole : 'patient');
})();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\mental_health_portal\resources\views/auth/register.blade.php ENDPATH**/ ?>
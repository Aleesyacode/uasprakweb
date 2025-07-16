<?php $__env->startPush('styles'); ?>
<style>
    body {
        background-color: #8BBBD4;
        font-family: 'Poppins', sans-serif;
    }

    .card-custom {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .form-label {
        font-weight: 600;
    }

    .btn-primary {
        background-color: #8BBBD4;
        border: none;
    }

    .btn-primary:hover {
        background-color: #74a6c4;
    }

    .text-title {
        font-weight: 800;
        font-size: 24px;
        color: #1f2937;
        text-align: center;
        margin-bottom: 20px;
    }

    .register-container {
        margin-top: 60px;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container register-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-custom p-4">
                <div class="text-title">Begin Your Mission – Create Your S.H.I.E.L.D. Mood Profile</div>

                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label class="form-label">Agent Codename</label>
                        <input type="text" name="username" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('username')); ?>" required autofocus>

                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Access Key</label>
                        <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            required>

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Access Key</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Register as an Agent</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\Documents\Mood-Tracker\mood-tracker\resources\views/auth/register.blade.php ENDPATH**/ ?>
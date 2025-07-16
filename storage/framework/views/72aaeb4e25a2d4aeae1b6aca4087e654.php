

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold">Edit Daily Journal</h2>

    <form method="POST" action="<?php echo e(route('journals.update', $journal->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php echo e(old('date', $journal->date)); ?>" required>
            <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Today's Mood</label>
            <select name="mood" class="form-control <?php $__errorArgs = ['mood'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                <option value="">Choose the Mood</option>
                <?php $__currentLoopData = ['Happy', 'Sad', 'Angry', 'Calm', 'Anxious', 'Excited']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mood): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($mood); ?>" <?php echo e(old('mood', $journal->mood) == $mood ? 'selected' : ''); ?>><?php echo e($mood); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['mood'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Today's Activities</label>
            <?php
                $activityList = ['Study', 'Work', 'Exercise', 'Watch', 'Play Games', 'Eat', 'Sleep'];
                $selectedActivities = json_decode($journal->activities, true) ?? [];
            ?>
            <div class="d-flex flex-wrap gap-3">
                <?php $__currentLoopData = $activityList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="activities[]" value="<?php echo e($activity); ?>"
                               id="activity_<?php echo e($activity); ?>"
                               <?php echo e(in_array($activity, old('activities', $selectedActivities)) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="activity_<?php echo e($activity); ?>"><?php echo e($activity); ?></label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">To-Do List</label>
            <textarea name="to_do_list" class="form-control"><?php echo e(old('to_do_list', $journal->to_do_list)); ?></textarea>
        </div>

        
        <div class="mb-3">
            <label class="form-label">Additional Notes</label>
            <textarea name="notes" class="form-control" rows="3"><?php echo e(old('notes', $journal->notes)); ?></textarea>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Update Journals</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\Documents\Mood-Tracker\mood-tracker\resources\views/journals/edit.blade.php ENDPATH**/ ?>
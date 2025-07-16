

<?php $__env->startSection('content'); ?>
<h1>Edit Mood</h1>
<form method="POST" action="<?php echo e(route('moods.update', $mood->id)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="mb-3">
        <label class="form-label">Mood</label>
        <input type="text" name="mood" class="form-control" value="<?php echo e($mood->mood); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Catatan</label>
        <textarea name="note" class="form-control"><?php echo e($mood->note); ?></textarea>
    </div>
    <button class="btn btn-success">Update</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\Documents\Mood-Tracker\mood-tracker\resources\views/moods/edit.blade.php ENDPATH**/ ?>
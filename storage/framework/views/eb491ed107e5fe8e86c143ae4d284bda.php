

<?php $__env->startSection('content'); ?>
<h1>Tambah Mood</h1>
<form method="POST" action="<?php echo e(route('moods.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label class="form-label">Mood</label>
        <input type="text" name="mood" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Catatan</label>
        <textarea name="note" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary">Simpan</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\Documents\Mood-Tracker\mood-tracker\resources\views/moods/create.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <h2 class="text-center mb-4 fw-bold">Detail Jurnal Harian</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Tanggal:</strong> <?php echo e(\Carbon\Carbon::parse($journal->date)->format('d M Y')); ?></p>
            <p><strong>Mood Hari Ini:</strong> <?php echo e($journal->mood); ?></p>

            <p><strong>Aktivitas:</strong><br>
                <?php if($journal->activities): ?>
                    <?php $__currentLoopData = json_decode($journal->activities, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge bg-primary"><?php echo e($activity); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <em>Tidak ada</em>
                <?php endif; ?>
            </p>

            <p><strong>To-Do List:</strong><br>
                <?php echo e($journal->to_do_list ?? '-'); ?>

            </p>

            <p><strong>Catatan:</strong><br>
                <?php echo e($journal->notes ?? '-'); ?>

            </p>

            <div class="mt-4 d-flex justify-content-end gap-2">
                <a href="<?php echo e(route('journals.edit', $journal->id)); ?>" class="btn btn-warning">Edit</a>
                <a href="<?php echo e(route('journals.index')); ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\Documents\Mood-Tracker\mood-tracker\resources\views/journals/show.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
    <h1>Riwayat Mood</h1>
    <a href="<?php echo e(route('moods.create')); ?>" class="btn btn-primary mb-3">Tambah Mood</a>

    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Mood</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $moods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mood): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($mood->created_at->format('d M Y')); ?></td>
                <td><?php echo e($mood->mood); ?></td>
                <td><?php echo e($mood->note); ?></td>
                <td>
                    <a href="<?php echo e(route('moods.edit', $mood->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="<?php echo e(route('moods.destroy', $mood->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\Documents\Mood-Tracker\mood-tracker\resources\views/moods/index.blade.php ENDPATH**/ ?>
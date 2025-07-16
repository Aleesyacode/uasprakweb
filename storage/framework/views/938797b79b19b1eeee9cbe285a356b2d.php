

<?php $__env->startSection('content'); ?>
<div class="container my-5">

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daily Journal List</h2>
        <a href="<?php echo e(route('journals.create')); ?>" class="btn btn-success">+ How's Your Day?</a>
    </div>

    <form action="<?php echo e(route('journals.index')); ?>" method="GET" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="search_date" class="form-label">Search by date</label>
            <input type="date" name="search_date" id="search_date" class="form-control" value="<?php echo e(request('search_date')); ?>">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button class="btn btn-outline-dark" type="submit">Search</button>
        </div>
    </form>


    <?php if($journals->isEmpty()): ?>
        <div class="alert alert-info">The database is empty. Agent, we need your first emotional report.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th style="width: 150px;">Date</th>
                        <th>Mood</th>
                        <th>Activity</th>
                        <th>Note</th>
                        <th style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $journals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $journal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(\Carbon\Carbon::parse($journal->date)->format('d M Y')); ?></td>
                            <td><?php echo e($journal->mood); ?></td>
                            <td>
                                <?php $__currentLoopData = json_decode($journal->activities, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge bg-primary"><?php echo e($activity); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><?php echo e(Str::limit($journal->notes, 50)); ?></td>
                            <td class="text-nowrap">
                                <a href="<?php echo e(route('journals.show', $journal->id)); ?>" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-eye"></i> Show
                                </a>
                                <a href="<?php echo e(route('journals.edit', $journal->id)); ?>" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Update
                                </a>
                                <form action="<?php echo e(route('journals.destroy', $journal->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau di hapus?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User\Documents\Mood-Tracker\mood-tracker\resources\views/journals/index.blade.php ENDPATH**/ ?>
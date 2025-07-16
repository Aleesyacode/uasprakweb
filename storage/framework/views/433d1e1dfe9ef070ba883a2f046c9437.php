<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?php echo e(config('app.name', 'S.H.I.E.L.D. Your Mood')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
      .custom-login {
           background-color: transparent;
           border: 2px solid #8BBBD4;
           color: #8BBBD4;
           font-weight: 600;
        }

     .custom-login:hover {
           background-color: #8BBBD4;
           color: white;
        }

     .custom-signup {
            background-color: #8BBBD4;
            color: white;
            font-weight: 600;
            border: none;
        }

     .custom-signup:hover {
            background-color: #74a6c4;
            color: white;
        }

      body {
            background-color: #8BBBD4;
            font-family: 'Poppins', sans-serif;
            color: #1f2937;
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="<?php echo e(url('/')); ?>">S.H.I.E.L.D. Your Mood</a>

            <div class="d-flex">
                <?php if(auth()->guard()->guest()): ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn custom-login me-2">Login</a>
                    <a href="<?php echo e(route('register')); ?>" class="btn custom-signup">Sign Up</a>


                <?php else: ?>
                    <span class="me-3 mt-2">Halo, <?php echo e(Auth::user()->username); ?></span>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\User\Documents\Mood-Tracker\mood-tracker\resources\views/layouts/app.blade.php ENDPATH**/ ?>
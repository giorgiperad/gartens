<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'რეგისტრაცია')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <?php echo $__env->yieldPushContent('styles'); ?>
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/vendors/admin-lte-core.css')); ?>">


</head>
<body class="font-sans antialiased hold-transition sidebar-mini layout-fixed">
  <?php echo $__env->make('partials.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('partials.main-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="content-wrapper" id="app">
        <?php if(Session::has('flashMessage')): ?>
          <div class="alert alert-dismissible <?php echo e(Session::has('flashType') ? 'alert-'.session('flashType') : ''); ?>">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> შეტყობინება!</h5>
            <?php echo e(session('flashMessage')); ?>

          </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
          <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

 <!-- Scripts -->
 <script src="<?php echo e(mix('js/manifest.js')); ?>"></script>
 <script src="<?php echo e(mix('js/vendor.js')); ?>"></script>
 <script src="<?php echo e(mix('js/bootstrap.js')); ?>"></script>
 <script src="<?php echo e(mix('js/app.js')); ?>"></script>
 <script src="<?php echo e(mix('js/vendors/admin-lte-core.js')); ?>"></script>
 <script>window.jQuery = $</script>
 <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /home/u814212997/domains/lightslategray-jackal-229176.hostingersite.com/public_html/resources/views/layouts/app.blade.php ENDPATH**/ ?>
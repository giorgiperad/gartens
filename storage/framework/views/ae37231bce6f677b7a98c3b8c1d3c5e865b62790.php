<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravels')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

</head>
<body>
 <?php echo $__env->yieldContent('content'); ?>
 <!-- Scripts -->
 <script src="<?php echo e(mix('js/manifest.js')); ?>" defer></script>
 <script src="<?php echo e(mix('js/vendor.js')); ?>" defer></script>
 <script src="<?php echo e(mix('js/bootstrap.js')); ?>" defer></script>
 <script src="<?php echo e(mix('js/app.js')); ?> " defer></script>

</body>
</html>
<?php /**PATH /home/mtskhet4/public_html/resources/views/layouts/basic.blade.php ENDPATH**/ ?>
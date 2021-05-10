<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>" />
    </head>
    <body>
        <?php echo $__env->yieldContent('content'); ?>;

        <script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\practica2021-master\resources\views/base.blade.php ENDPATH**/ ?>
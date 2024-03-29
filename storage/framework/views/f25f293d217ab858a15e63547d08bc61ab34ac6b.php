<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $__env->yieldContent('head_title', getcong('site_name')); ?></title>
        <meta name="description" content="<?php echo $__env->yieldContent('head_description'); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?php echo $__env->yieldContent('head_title',  getcong('site_name')); ?>" />
        <meta property="og:description" content="<?php echo $__env->yieldContent('head_description', getcong('site_description')); ?>" />
        <meta property="og:keywords" content="<?php echo $__env->yieldContent('head_keywords', getcong('site_description')); ?>" />
        <meta property="og:image" content="<?php echo $__env->yieldContent('head_image', url('/upload/logo.png')); ?>" />
        <meta property="og:url" content="<?php echo $__env->yieldContent('head_url', url('/')); ?>" />
        <!-- Web fonts -->

        <link rel="shortcut icon" href="<?php echo e(URL::asset('upload/'.getcong('site_favicon'))); ?>">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"> 
        <link href="<?php echo e(URL::asset('profile_assets/site_assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('profile_assets/site_assets/css/animate.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('profile_assets/site_assets/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('profile_assets/site_assets/css/daterangepicker.css')); ?>" rel="stylesheet" type="text/css" media="all">
        <link href="<?php echo e(URL::asset('profile_assets/site_assets/css/style.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(URL::asset('profile_assets/site_assets/css/flat-css/flaticon.css')); ?>" rel="stylesheet"> 		
        <link href="<?php echo e(URL::asset('profile_assets/site_assets/css/ionicons.min.css')); ?>" rel="stylesheet"> 
        <link href="<?php echo e(URL::asset('profile_assets/site_assets/css/select2.min.css')); ?>" rel="stylesheet"> 
        <link href="<?php echo e(URL::asset('profile_assets/site_assets/css/style_chat.css')); ?>" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    </head>
    <style>
        #myProgress {
            width: 100%;
            background-color: #ddd;
        }

        #myBar {
            width: 0%;
            height: 30px;
            background-color: #4CAF50;
        }
    </style>
    <body>
        <?php ini_set('display_errors', '1'); ?>      
        <?php echo $__env->make("includes.header1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent("content"); ?>


        <?php echo $__env->make("includes.footer1", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-------- Scripts ---------->
        <script src="<?php echo e(URL::asset('profile_assets/site_assets/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('profile_assets/site_assets/js/moment.js')); ?>" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo e(URL::asset('profile_assets/site_assets/js/daterangepicker.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('profile_assets/site_assets/js/jquery-simple-mobilemenu.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('profile_assets/site_assets/js/select2.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('profile_assets/site_assets/js/jquery.cropit.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('profile_assets/site_assets/js/custom.js')); ?>"></script>
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>


    </body>
</html><?php /**PATH C:\xampp\htdocs\linkliveducation2\resources\views/app1.blade.php ENDPATH**/ ?>
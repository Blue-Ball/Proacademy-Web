<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="<?php echo get_option('site_fav','/assets/default/404/images/favicon.png'); ?>" type="image/png" sizes="32x32">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keyword'); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="description" content="<?php echo get_option('site_description',''); ?>">
    <link rel="stylesheet" href="/assets/default/vendor/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/default/vendor/bootstrap/css/bootstrap-3.2.rtl.css"/>
    <link rel="stylesheet" href="/assets/default/vendor/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/assets/default/vendor/owlcarousel/dist/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="/assets/default/vendor/raty/jquery.raty.css"/>
    <link rel="stylesheet" href="/assets/default/view/fluid-player-master/fluidplayer.min.css"/>
    <link rel="stylesheet" href="/assets/default/vendor/simplepagination/simplePagination.css"/>
    <link rel="stylesheet" href="/assets/default/vendor/easyautocomplete/easy-autocomplete.css"/>
    <link rel="stylesheet" href="/assets/default/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css"/>
    <link rel="stylesheet" href="/assets/default/vendor/jquery-te/jquery-te-1.4.0.css"/>
    <link rel="stylesheet" href="/assets/default/stylesheets/vendor/mdi/css/materialdesignicons.min.css"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter&display=swap">

    <?php if(get_option('site_rtl','0') == 1): ?>
        <link rel="stylesheet" href="/assets/default/stylesheets/view-custom-rtl.css"/>
    <?php else: ?>
        <link rel="stylesheet" href="/assets/default/stylesheets/view-custom.css?time=<?php echo time(); ?>"/>
    <?php endif; ?>
    <link rel="stylesheet" href="/assets/default/stylesheets/view-responsive.css"/>
    <?php if(get_option('main_css')!=''): ?>
        <style>
            <?php echo get_option('main_css'); ?>

        </style>
    <?php endif; ?>
    <script type="application/javascript" src="/assets/default/vendor/jquery/jquery.min.js"></script>
    <title><?php echo $__env->yieldContent('title'); ?><?php echo $title ?? ''; ?></title>
    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>
<style type="text/css">

.cat-h {
    height: 60px;
    display: flex;
    align-items: center;
    font-size: 16px;
}

.navbar-nav li:hover>ul {
    display:block;
    z-index: 10000;
}

/*.dropdown-menu li:hover>ul {
    display:block;
    z-index: 10000;
}*/

.dropdown-menu {
    left: 0 !important;
    text-align: left !important;
    width: 230px !important;
    height: 360px !important;
    /*left: auto !important;*/
}

.drop-sub {
    top: -3px !important;
    left: 228px !important;
    height: 360px !important;
}

.cat-li {
    padding: 8px !important;
}

@media (min-width: 0px) and (max-width: 768px)  {
    .cat-h {
        display: none;
    }
}

</style>
<div class="container-fluid">
    <div class="row line-header"></div>
    <div class="col-md-10 col-md-offset-1">
        <div class="row middle-header">
            <div class="col-md-2 col-xs-12 tab-con">
                <div class="row">
                    <a href="/">
                        <img src="<?php echo e(get_option('site_logo')); ?>" alt="<?php echo e(get_option('site_title')); ?>" class="logo-icon"/>
                        <!-- <img src="<?php echo e(get_option('site_logo_type')); ?>" alt="<?php echo e(get_option('site_title')); ?>" class="logo-type"/> -->
                    </a>
                </div>
            </div>
            <div class="col-md-1 col-xs-12 tab-con">
                <div class="row cat-h">
                    <ul class="navbar-nav list-unstyled">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color:#4c4c4c;">Categories</a>
                            <ul class="dropdown-menu">
                                <?php $__currentLoopData = $setting['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="cat-li" onmouseover="this.style.borderColor='<?php echo e($mainCategory->color); ?>'" onmouseleave="this.style.borderColor='transparent'">
                                            
                                        <?php if(count($mainCategory->childs)>0): ?>
                                            <a class="dropdown-item">
                                                <img src="<?php echo e($mainCategory->image); ?>" style="width:20px;height:20px;" />
                                                <?php echo e($mainCategory->title); ?>                                            
                                            </a>
                                            <ul class="dropdown-menu drop-sub">
                                                <?php $__currentLoopData = $mainCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="cat-li">
                                                        <a class="dropdown-item" href="/category/<?php echo e($child->class); ?>">
                                                            <img src="<?php echo e($child->image); ?>" style="width:16px;height:16px;" />
                                                            <?php echo e($child->title); ?>

                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php else: ?>
                                            <a class="dropdown-item" href="/category/<?php echo e($mainCategory->class); ?>">
                                                <img src="<?php echo e($mainCategory->image); ?>" style="width:20px;height:20px;" />
                                                <?php echo e($mainCategory->title); ?>                                            
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul> 
                        </li>
                    </ul>
                                       
                </div>
            </div>
            <div class="col-md-5 col-xs-12 tab-con">
                <div class="row search-box">
                    <form action="/search">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" name="q" class="col-md-11 provider-json" placeholder="Search..."/>
                        <button type="submit" name="search" class="pull-left col-md-1"><span class="homeicon mdi mdi-magnify"></span></button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 text-center tab-con">
                <div class="row">
                    <?php if(isset($user) && isset($user['vendor']) && $user['vendor'] == 1): ?>
                        <a href="/user/content/new" class="header-upload-button pulse"><span class="headericon mdi mdi-arrow-up-bold"></span><?php echo e(trans('main.upload_course')); ?></a>
                    <?php endif; ?>
                    <?php if(isset($user)): ?>
                        <a href="/user/ticket" class="header-login-in-button">
                            <img src="<?php echo e($userMeta['avatar'] ?? get_option('default_user_avatar','')); ?>" class="user-header-avatar">
                            <span class="header-title-caption"><?php echo e($user['name']); ?></span>
                            <span class="headericon mdi mdi-chevron-down"></span>
                            <label class="alert">
                                <?php if(isset($alert['all']) && $alert['all']>0): ?>
                                    <span class="noti-holder"><?php echo e($alert['all']); ?></span>
                                <?php endif; ?>
                                <span class="noti-icon headericon mdi mdi-bell-alert" onclick="window.location.href='/user/ticket/notification';"></span>
                            </label>
                            <label onclick="event.stopPropagation();" class="alert alert-f">
                                <?php if(isset($alert['ticket']) && $alert['ticket']>0): ?>
                                    <span><?php echo e($alert['ticket']); ?></span>
                                <?php endif; ?>
                                <i class="headericon mdi mdi-email"></i>
                            </label>
                            <div class="animated user-overlap sbox3">
                                <div class="overlap-profile-viewer">
                                    <?php if(isset($user) && isset($user['vendor']) && $user['vendor'] == 1): ?>
                                        <a href="/user/dashboard">
                                            <img src="<?php echo e(!empty($userMeta['avatar']) ? $userMeta['avatar'] : '/assets/default/images/user.png'); ?>" class="dash-s">
                                        </a>
                                    <?php else: ?>
                                        <a href="/user/content"><img src="<?php echo e(!empty($userMeta['avatar']) ? $userMeta['avatar'] : '/assets/default/images/user.png'); ?>" class="dash-s"></a>
                                    <?php endif; ?>
                                    <?php if(isset($user) && isset($user['vendor']) && $user['vendor'] == 1): ?>
                                        <div class="overlap-profile-viewer-info">
                                            <a href="/user/dashboard" class="dash-s2"><span><?php echo e(!empty($user['category']['title']) ? $user['category']['title'] : 'General User'); ?></span></a>
                                            <a href="/user/dashboard" class="btn btn-danger"><?php echo e(trans('main.user_panel')); ?></a>
                                        </div>
                                    <?php else: ?>
                                        <div class="overlap-profile-viewer-info">
                                            <a href="/user/video/buy" class="dash-s2"><span><?php echo e(!empty($user['category']['title']) ? $user['category']['title'] : 'General User'); ?></span></a>
                                            <a href="/user/video/buy" class="btn btn-danger"><?php echo e(trans('main.user_panel')); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <ul>
                                    <li><a href="/profile/<?php echo e($user['id']); ?>"><span class="headericon mdi mdi-account"></span>
                                            <p><?php echo e(trans('main.profile')); ?></p></a></li>
                                    <li><a href="/user/ticket"><span class="headericon mdi mdi-headset"></span>
                                            <p><?php echo e(trans('main.support')); ?></p></a></li>
                                    <li><a href="/category?order=favorite"><span class="headericon mdi mdi-heart"></span>
                                            <p><?php echo e(trans('main.favorite')); ?></p></a></li>
                                    <li><a href="/user/profile"><span class="headericon mdi mdi-settings"></span>
                                            <p><?php echo e(trans('main.settings')); ?></p></a></li>
                                    <li><a href="/logout"><span class="headericon mdi mdi-power"></span>
                                            <p><?php echo e(trans('main.exit')); ?></p></a></li>
                                </ul>
                            </div>
                        </a>
                    <?php else: ?>
                        <a href="/user?redirect=<?php echo e(Request::path()); ?>" class="header-login-button"><span class="headericon mdi mdi-account"></span><?php echo e(trans('main.login_signup')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row sep"></div>
    <!-- <div class="hidden-xs" id="header-menu-section"> -->
    <div class="hidden-xs" style="display:none;">
        <div class="row">
            <!-- ======================================================================================== -->
            <!--
            <div class="menu-header">
                <div class="col-md-1 text-center tab-con">
                    <a href="/"><img src="<?php echo e(get_option('site_logo')); ?>" class="menu-logo"/></a>
                </div>
                <div class="col-md-10 col-xs-12 tab-con">
                    <ul id="accordion" class="cat-filters-li accordion accordion-s">
                        <?php $__currentLoopData = $setting['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($mainCategory->childs)>0): ?>
                                <li class="has-child" onmouseover="this.style.borderColor='<?php echo e($mainCategory->color); ?>'" onmouseleave="this.style.borderColor='transparent'">
                                    <a href="javascript:void(0);">
                                        <img src="<?php echo e($mainCategory->image); ?>"/>
                                        <?php echo e($mainCategory->title); ?>

                                    </a>
                                    <ul>
                                        <?php $__currentLoopData = $mainCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li onmouseover="this.style.borderColor='<?php echo e($child->color); ?>'" onmouseleave="this.style.borderColor='transparent'">
                                                <a href="/category/<?php echo e($child->class); ?>">
                                                    <img src="<?php echo e($child->image); ?>"/>
                                                    <?php echo e($child->title); ?>

                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="no-child" onmouseover="this.style.borderColor='<?php echo e($mainCategory->color); ?>'" onmouseleave="this.style.borderColor='transparent'">
                                    <a href="/category/<?php echo e($mainCategory->class); ?>">
                                        <img src="<?php echo e($mainCategory->image); ?>"/>
                                        <?php echo e($mainCategory->title); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="sep-green"></div>
            <div class="menu-header menu-header-child">

                <div class="col-md-10 col-xs-12 col-md-offset-1">
                    <ul>
                    </ul>
                </div>

            </div>
            -->                            
            <!-- =============================================================================================== -->
        </div>
    </div>
    <div class="hidden-md hidden-lg hidden-sm mobile-menu">
        <div class="row h-20"></div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><b><?php echo e(trans('main.category')); ?></b></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php $__currentLoopData = $setting['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($mainCategory->childs)>0): ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e($mainCategory->title); ?><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <?php $__currentLoopData = $mainCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="/category/<?php echo e($child->class); ?>"><?php echo e($child->title); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li><a href="/category/<?php echo e($mainCategory->class); ?>"><?php echo e($mainCategory->title); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>


<?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/view/layout/header.blade.php ENDPATH**/ ?>
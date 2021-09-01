<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Panel - <?php echo $__env->yieldContent('title', ''); ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/admin/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/admin/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/admin/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/assets/admin/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/assets/admin/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <link rel="stylesheet" href="/assets/admin/css/components.css">

    <?php if(get_option('site_rtl','0') == 1): ?>
        <link rel="stylesheet" href="/assets/admin/css/rtl.css"/>
    <?php endif; ?>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/admin/css/admin-custom.css">
    <style>
        .custom-switch-input:checked ~ .custom-switch-description {
            position: relative;
            top: 4px;
        }
        .modal-backdrop.show{
             display: none !important;
         }
    </style>
    <!-- Start GA -->
    <link rel="stylesheet" href="//rawgit.com/google/code-prettify/master/src/prettify.css"/>
    <!-- /END GA --></head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <?php echo e(csrf_field()); ?>

                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="/assets/admin/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $Admin['username'] ?? ''; ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="/admin/profile" class="dropdown-item has-icon">
                            <i class="fas fa-user"></i> <?php echo trans('admin.profile'); ?>

                        </a>
                        <a href="/admin/setting/main" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> <?php echo trans('admin.settings'); ?>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="/admin/logout" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> <?php echo trans('admin.exit'); ?>

                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="/admin">Admin Panel</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="/admin">AP</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <?php if(checkAccess('report')): ?>
                        <li class="dropdown" id="report">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/report/user"><?php echo e(trans('admin.users_report')); ?></a></li>
                                <li><a class="nav-link" href="/admin/report/content"><?php echo e(trans('admin.products_report')); ?></a></li>
                                <li><a class="nav-link" href="/admin/report/balance"><?php echo e(trans('admin.financial_report')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <li class="menu-header">CRM</li>
                    <?php if(checkAccess('manager')): ?>
                        <li class="dropdown" id="manager">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span><?php echo e(trans('admin.employees')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/manager/lists"><?php echo e(trans('admin.list')); ?></a></li>
                                <li><a class="nav-link" href="/admin/manager/new"><?php echo e(trans('admin.new_employee')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if(checkAccess('user')): ?>
                        <li class="dropdown" id="user">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span><?php echo e(trans('admin.users')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/user/lists"><?php echo e(trans('admin.list')); ?></a></li>
                                <li><a class="nav-link" href="/admin/user/vendor"><?php echo e(trans('admin.vendor')); ?></a></li>
                                <li><a class="nav-link" href="/admin/user/category"><?php echo e(trans('admin.user_groups')); ?></a></li>
                                <li><a class="nav-link" href="/admin/user/rate"><?php echo e(trans('admin.users_badges')); ?></a></li>
                                <li><a class="nav-link" href="/admin/user/seller"><?php echo e(trans('admin.identity_verification')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if(checkAccess('ticket')): ?>
                        <li class="dropdown" id="ticket">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-life-ring"></i> <span><?php echo e(trans('admin.support')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/ticket/tickets"><?php echo e(trans('admin.list')); ?></a></li>
                                <li><a class="nav-link" href="/admin/ticket/ticketsopen"><?php echo e(trans('admin.pending_tickets')); ?></a></li>
                                <li><a class="nav-link" href="/admin/ticket/ticketsclose"><?php echo e(trans('admin.closed_tickets')); ?></a></li>
                                <li><a class="nav-link" href="/admin/ticket/category"><?php echo e(trans('admin.support_departments')); ?></a></li>
                                <li><a class="nav-link" href="/admin/ticket/new"><?php echo e(trans('admin.submit_ticket')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if(checkAccess('notification')): ?>
                        <li class="dropdown" id="notification">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bell"></i> <span><?php echo e(trans('admin.notifications')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/notification/template"><?php echo e(trans('admin.templates')); ?></a></li>
                                <li><a class="nav-link" href="/admin/notification/template/tnew"><?php echo e(trans('admin.new_template')); ?></a></li>
                                <li><a class="nav-link" href="/admin/notification/list"><?php echo e(trans('admin.sent_notifications')); ?></a></li>
                                <li><a class="nav-link" href="/admin/notification/new"><?php echo e(trans('admin.new_notification')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <li class="menu-header">Content</li>
                    <?php if(checkAccess('content')): ?>
                        <li class="dropdown" id="content">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-video"></i> <span><?php echo e(trans('admin.courses')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/content/list"><?php echo e(trans('admin.list')); ?></a></li>
                                <li><a class="nav-link <?php if(isset($alert['content_waiting']) and $alert['content_waiting'] > 0): ?> beep beep-sidebar <?php endif; ?>" href="/admin/content/waiting"><?php echo e(trans('admin.pending_courses')); ?></a></li>
                                <li><a class="nav-link <?php if(isset($alert['content_draft']) and $alert['content_draft'] > 0): ?> beep beep-sidebar <?php endif; ?>" href="/admin/content/draft"><?php echo e(trans('admin.unpublished_courses')); ?></a></li>
                                <li><a class="nav-link" href="/admin/content/comment"><?php echo e(trans('admin.corse_comments')); ?></a></li>
                                <li><a class="nav-link" href="/admin/content/support"><?php echo e(trans('admin.support_tickets')); ?></a></li>
                                <li><a class="nav-link" href="/admin/content/category"><?php echo e(trans('admin.categories')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if(checkAccess('live')): ?>
                        <li class="dropdown" id="live">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-camera"></i> <span><?php echo e(trans('admin.meeting')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/live/list"><?php echo e(trans('admin.list')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(checkAccess('request')): ?>
                        <li class="dropdown" id="request">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-plus-square"></i> <span><?php echo e(trans('admin.course_requests')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/request/list"><?php echo e(trans('admin.requests_list')); ?></a></li>
                                <li><a class="nav-link" href="/admin/request/record/list"><?php echo e(trans('admin.future_courses')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if(checkAccess('blog')): ?>
                        <li class="dropdown" id="blog">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-word"></i> <span><?php echo e(trans('admin.blog_articles')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/blog/posts"><?php echo e(trans('admin.blog_posts')); ?></a></li>
                                <li><a class="nav-link" href="/admin/blog/post/new"><?php echo e(trans('admin.new_post')); ?></a></li>
                                <li><a class="nav-link" href="/admin/blog/category"><?php echo e(trans('admin.contents_categories')); ?></a></li>
                                <li><a class="nav-link" href="/admin/blog/comments"><?php echo e(trans('admin.blog_comments')); ?></a></li>
                                <li><a class="nav-link" href="/admin/blog/article"><?php echo e(trans('admin.articles')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if(checkAccess('channel')): ?>
                        <li class="dropdown" id="channel">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-eye"></i> <span><?php echo e(trans('admin.channels')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/channel/list"><?php echo e(trans('admin.list')); ?></a></li>
                                <li><a class="nav-link <?php if(isset($alert['channel_request']) && $alert['channel_request'] > 0): ?> beep beep-sidebar <?php endif; ?>" href="/admin/channel/request"><?php echo e(trans('admin.verification_requests')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(checkAccess('quizzes')): ?>
                        <li class="dropdown" id="quizzes">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-chart-pie"></i> <span><?php echo e(trans('admin.quizzes')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/quizzes/list"><?php echo e(trans('admin.list')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>


                        <li class="dropdown" id="certificates">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i>
                                <span><?php echo e(trans('admin.certificates')); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/certificates/list"><?php echo e(trans('admin.list')); ?></a></li>
                                <li><a class="nav-link" href="/admin/certificates/templates"><?php echo e(trans('admin.templates')); ?></a></li>
                                <li><a class="nav-link" href="/admin/certificates/templates/new"><?php echo e(trans('admin.new_template')); ?></a></li>
                            </ul>
                        </li>

                    <li class="menu-header">Financial</li>
                    <?php if(checkAccess('buysell')): ?>
                        <li id="buysell">
                            <a href="/admin/buysell/list" class="nav-link"><i class="fas fa-shopping-cart"></i> <span><?php echo e(trans('admin.sales')); ?></span></a>
                        </li><?php endif; ?>
                    <?php if(checkAccess('balance')): ?>
                        <li class="dropdown" id="balance">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-chart-pie"></i> <span><?php echo e(trans('admin.financial')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/balance/list"><?php echo e(trans('admin.financial_documents')); ?></a></li>
                                <li><a class="nav-link <?php if(isset($alert['withdraw']) and $alert['withdraw'] > 0): ?> beep beep-sidebar <?php endif; ?>" href="/admin/balance/withdraw"><?php echo e(trans('admin.withdrawal_list')); ?></a></li>
                                <li><a class="nav-link" href="/admin/balance/new"><?php echo e(trans('admin.new_balance')); ?></a></li>
                                <li><a class="nav-link" href="/admin/balance/analyzer"><?php echo e(trans('admin.financial_analyser')); ?></a></li>
                                <li><a class="nav-link" href="/admin/balance/transaction"><?php echo e(trans('admin.transactions_report')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="menu-header">Marketing</li>
                    <?php if(checkAccess('email')): ?>
                        <li class="dropdown" id="email">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-envelope"></i> <span><?php echo e(trans('admin.emails')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/email/templates"><?php echo e(trans('admin.email_templates')); ?></a></li>
                                <li><a class="nav-link" href="/admin/email/template/new"><?php echo e(trans('admin.new_template')); ?></a></li>
                                <li><a class="nav-link" href="/admin/email/new"><?php echo e(trans('admin.send_email')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if(checkAccess('discount')): ?>
                        <li class="dropdown" id="discount">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-gift"></i> <span><?php echo e(trans('admin.discounts')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/discount/list"><?php echo e(trans('admin.giftcards_list')); ?></a></li>
                                <li><a class="nav-link" href="/admin/discount/new"><?php echo e(trans('admin.new_giftcard')); ?></a></li>
                                <li><a class="nav-link" href="/admin/discount/contentlist"><?php echo e(trans('admin.promotions_list')); ?></a></li>
                                <li><a class="nav-link" href="/admin/discount/contentnew"><?php echo e(trans('admin.new_promotion')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if(checkAccess('ads')): ?>
                        <li class="dropdown" id="ads">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-ad"></i> <span><?php echo e(trans('admin.advertising')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/ads/plans"><?php echo e(trans('admin.plans')); ?></a></li>
                                <li><a class="nav-link" href="/admin/ads/newplan"><?php echo e(trans('admin.new_plan')); ?></a></li>
                                <li><a class="nav-link" href="/admin/ads/request"><?php echo e(trans('admin.advertisement_requests')); ?></a></li>
                                <li><a class="nav-link" href="/admin/ads/box"><?php echo e(trans('admin.banners')); ?></a></li>
                                <li><a class="nav-link" href="/admin/ads/newbox"><?php echo e(trans('admin.new_banner')); ?></a></li>
                                <li><a class="nav-link" href="/admin/ads/vip"><?php echo e(trans('admin.featured_products')); ?></a></li>
                            </ul>
                        </li><?php endif; ?>
                    <?php if(checkAccess('setting')): ?>
                        <li class="menu-header">Setting & Profile</li>
                    <?php endif; ?>
                    <?php if(checkAccess('setting')): ?>
                        <li class="dropdown" id="setting">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span><?php echo e(trans('admin.settings')); ?></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/admin/setting/main"><?php echo e(trans('admin.general_settings')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/display"><?php echo e(trans('admin.custom_codes')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/user"><?php echo e(trans('admin.users_settings')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/content"><?php echo e(trans('admin.course_settings')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/term"><?php echo e(trans('admin.rules')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/blog"><?php echo e(trans('admin.blog_article_settings')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/notification"><?php echo e(trans('admin.notification_settings')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/social"><?php echo e(trans('admin.social_networks')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/footer"><?php echo e(trans('admin.footer_settings')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/pages"><?php echo e(trans('admin.custom_pages')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/default"><?php echo e(trans('admin.default_placeholders')); ?></a></li>
                                <li><a class="nav-link" href="/admin/setting/view_templates"><?php echo e(trans('admin.view_templates')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="/admin/about" class="nav-link"><i class="fas fa-info"></i> <span><?php echo e(trans('admin.about')); ?></span></a>
                    </li>
                     
                    <li>
                        <a href="/admin/logout" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span><?php echo e(trans('admin.exit')); ?></span></a>
                    </li>
                </ul>
            </aside>
        </div>
        <div class="main-content">
            <div class="section">
                <div class="section-header">
                    <h1><?php echo $__env->yieldContent('title', ''); ?></h1>
                    <?php if(isset($breadcom) and count($breadcom)): ?>
                        <div class="section-header-breadcrumb">
                            <?php $__currentLoopData = $breadcom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="breadcrumb-item"><?php echo $bread; ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="section-body">
                    <?php echo $__env->yieldContent('page'); ?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('admin.newlayout.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('modals'); ?>
    </div>
</div>
<!-- General JS Scripts -->
<script src="/assets/admin/modules/jquery.min.js"></script>
<script src="/assets/admin/modules/popper.js"></script>
<script src="/assets/admin/modules/tooltip.js"></script>
<script src="/assets/admin/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="/assets/admin/modules/moment.min.js"></script>
<script src="/assets/admin/js/stisla.js"></script>
<script src="/assets/admin/modules/cleave-js/dist/cleave.min.js"></script>
<script src="/assets/admin/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="/assets/admin/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="/assets/admin/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/assets/admin/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="/assets/admin/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="/assets/admin/modules/select2/dist/js/select2.full.min.js"></script>
<script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="/assets/admin/modules/jquery.sparkline.min.js"></script>
<script src="/assets/admin/modules/chart.min.js"></script>
<script src="/assets/admin/modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="/assets/admin/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="/assets/admin/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>
<script src="/assets/admin/modules/datatables/datatables.min.js"></script>
<script src="/assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="/assets/admin/modules/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="//rawgit.com/google/code-prettify/master/src/prettify.js"></script>
<script src="/assets/admin/modules/summernote/summernote.min.js"></script>
<script src="/assets/admin/modules/summernote/plugin/summernote-ext-codewrapper-master/dist/summernote-ext-codewrapper.min.js"></script>
<script src="/assets/admin/modules/summernote/plugin/summernote-ext-highlight-master/src/summernote-ext-highlight.js"></script>
<script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="/assets/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
<script src="/assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="/assets/admin/modules/select2/dist/js/select2.full.min.js"></script>
<script src="/assets/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script src="/assets/admin/js/scripts.js"></script>
<script src="/assets/admin/js/custom.js"></script>
<script>
    $('.lfm_image').filemanager('file',{prefix: '/filemanager'});
    <?php if(isset($menu)): ?>
    $(function () {
        $('#<?php echo $menu; ?>').addClass('active');
    });
    <?php endif; ?>
    <?php if(isset($url)): ?>
    $(function () {
        $('.nav-link').each(function () {
            if ('<?php echo url('/'); ?>' + $(this).attr('href') == '<?php echo $url; ?>') {
                $(this).parent().addClass('active');
            }
        })
    });
    <?php endif; ?>
</script>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/admin/newlayout/layout.blade.php ENDPATH**/ ?>
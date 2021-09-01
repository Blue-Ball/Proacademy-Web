<div class="container-fluid">
    <div class="row ucp-menu-item">
        <div class="container">
            <?php if($alert['sell_all'] > 0 and (!isset($userMeta['seller_apply']) or $userMeta['seller_apply'] == '0')): ?>
                <div class="col-md-12 col-xs-12">
                    <div class="alert alert-danger">
                        <p><?php echo get_option('seller_not_apply',''); ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <div class="seven-cols">
                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/video/buy" class="item-box sbox3" id="buy-hover">
                        <span class="micon mdi mdi-library-video"></span>
                        <span><?php echo e(trans('main.courses')); ?></span>
                    </a>
                </div>

                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/quizzes" class="item-box sbox3" id="charge-hover">
                        <span class="micon mdi mdi-newspaper-variant-multiple-outline"></span>
                        <span><?php echo e(trans('main.quizzes')); ?></span>
                    </a>
                </div>

                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/video/request" class="item-box sbox3" id="request-hover">
                        <span class="micon mdi mdi-camera-enhance"></span>
                        <span><?php echo e(trans('main.requests')); ?></span>
                    </a>
                </div>

                <div class="h-10 visible-xs"></div>

                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/balance/log" class="item-box sbox3" id="balance-hover">
                        <span class="micon mdi mdi-finance"></span>
                        <span><?php echo e(trans('main.financial')); ?></span>
                    </a>
                </div>

                <div class="h-10 visible-xs"></div>
                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/ticket" class="item-box sbox3" id="ticket-hover">
                        <span class="micon mdi mdi-headset"></span>
                        <span><?php echo e(trans('main.support')); ?></span>
                    </a>
                </div>
                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a href="/user/profile" class="item-box sbox3" id="profile-hover">
                        <span class="micon mdi mdi-settings"></span>
                        <span><?php echo e(trans('main.settings')); ?></span>
                    </a>
                </div>
                <div class="h-10 visible-xs"></div>

                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                    <a <?php if(get_option('become_vendor') == 1): ?> href="/user/become" <?php else: ?> onclick="customNotify('<?php echo trans('main.become_vendor_disabled_message'); ?>');" <?php endif; ?> class="item-box sbox3" id="article-hover">
                        <span class="micon mdi mdi-teach"></span>
                        <span><?php echo e(trans('main.become_vendor')); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/user/layout_user/menu.blade.php ENDPATH**/ ?>
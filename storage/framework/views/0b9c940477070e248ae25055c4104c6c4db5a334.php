<?php $__env->startSection('title'); ?>
    <?php echo e(!empty($setting['site']['site_title']) ? $setting['site']['site_title'] : ''); ?>

    - <?php echo e($product->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description',$product->meta_description); ?>
<?php $__env->startSection('meta_keyword',$product->meta_keyword); ?>
<?php $__env->startSection('page'); ?>
    <div class="container-fluid">
        <div class="row product-header">
            <div class="container">
                <div class="col-xs-12 col-md-8 tab-con">
                    <h2><?php echo e($product->title); ?></h2>
                </div>
                <div class="col-xs-12 col-md-4 text-left">
                    <div class="raty-product-section">
                        <div class="raty"></div>
                        <span class="raty-text">(<?php echo e(count($product->rates)); ?> <?php echo e(trans('main.votes')); ?>)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-20"></div>
    <?php if(!empty($product['discount'])): ?>
        <div class="container">
            <div class="col-xs-12 col-md-12">
                <div class="product-discount-container">
                    <div class="col-md-4 col-xs-12 tab-con">
                        <div class="container-s-r">
                            <strong class="red-r"><?php if($product->discount->last_date - time() > 86400): ?> <?php echo e((floor(($product->discount->last_date - time()) / (60 * 60 * 24)))); ?> <?php else: ?> 0 <?php endif; ?></strong>
                            <strong><?php echo e(trans('main.days')); ?></strong>
                            <strong><?php echo e(trans('main.special_offer')); ?></strong>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 tab-con">
                        <div class="row">
                            <span class="off-btn">
                                <label>%<?php echo e(!empty($product->discount->off) ? $product->discount->off : 0); ?></label>
                                <label><?php echo e(trans('main.discount')); ?></label>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 tab-con">
                        <div class="countdown" dir="ltr">
                            <div class="bloc-time hours" data-init-value="<?php echo e(24-date('H',time())); ?>">
                                <div class="figure hours hours-1">
                                    <span class="top">2</span>
                                    <span class="top-back">
                                        <span>2</span>
                                    </span>
                                    <span class="bottom">2</span>
                                    <span class="bottom-back">
                                        <span>2</span>
                                    </span>
                                </div>
                                <div class="figure hours hours-2">
                                    <span class="top">4</span>
                                    <span class="top-back">
                                        <span>4</span>
                                    </span>
                                    <span class="bottom">4</span>
                                    <span class="bottom-back">
                                        <span>4</span>
                                    </span>
                                </div>
                            </div>
                            <div class="bloc-time min" data-init-value="<?php echo e(60-date('m',time())); ?>">
                                <div class="figure min min-1">
                                    <span class="top"></span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                                <div class="figure min min-2">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                            </div>
                            <div class="bloc-time sec" data-init-value="<?php echo e(60-date('s',time())); ?>">
                                <div class="figure sec sec-1">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                                <div class="figure sec sec-2">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-20"></div>
    <?php elseif(!empty($product->category->discount)): ?>
        <div class="container">
            <div class="col-xs-12 col-md-12">
                <div class="product-discount-container">
                    <div class="col-md-4 col-xs-12">
                        <div class="container-s-r">
                            <strong class="red-r"><?php if($product->category->discount->last_date - time() > 86400): ?> <?php echo e((floor(($product->category->discount->last_date - time()) / (60 * 60 * 24)))+1); ?> <?php else: ?> 0 <?php endif; ?> Day</strong>
                            <strong><?php echo e(trans('main.days')); ?></strong>
                            <strong><?php echo e(trans('main.special_offer')); ?></strong>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <div class="row">
                            <span class="off-btn">
                                <label>%<?php echo e(!empty($product->category->discount->off) ? $product->category->discount->off : 0); ?></label>
                                <label><?php echo e(trans('main.discount')); ?></label>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="countdown" dir="ltr">
                            <div class="bloc-time hours" data-init-value="<?php echo e(24-date('H',time())); ?>">
                                <div class="figure hours hours-1">
                                    <span class="top">2</span>
                                    <span class="top-back">
                                        <span>2</span>
                                    </span>
                                    <span class="bottom">2</span>
                                    <span class="bottom-back">
                                        <span>2</span>
                                    </span>
                                </div>
                                <div class="figure hours hours-2">
                                    <span class="top">4</span>
                                    <span class="top-back">
                                        <span>4</span>
                                    </span>
                                    <span class="bottom">4</span>
                                    <span class="bottom-back">
                                        <span>4</span>
                                    </span>
                                </div>
                            </div>
                            <div class="bloc-time min" data-init-value="<?php echo e(60-date('m',time())); ?>">
                                <div class="figure min min-1">
                                    <span class="top"></span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                                <div class="figure min min-2">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                            </div>
                            <div class="bloc-time sec" data-init-value="<?php echo e(60-date('s',time())); ?>">
                                <div class="figure sec sec-1">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                                <div class="figure sec sec-2">
                                    <span class="top">0</span>
                                    <span class="top-back">
                                        <span>0</span>
                                    </span>
                                    <span class="bottom">0</span>
                                    <span class="bottom-back">
                                        <span>0</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-20"></div>
    <?php endif; ?>
    <div class="container-fluid">
        <div class="row product-body">
            <div class="container">
                <div class="col-md-4 col-xs-12 course_details">
                    <div class="product-details-box">
                        <span class="proicon mdi mdi-apps"></span>
                        <span class="pn-category"><?php echo e($product->category->title); ?></span>
                    </div>
                    <div class="product-details-box">
                        <span class="proicon mdi mdi-alarm"></span>
                        <span><?php echo e(contentDuration($product->id)); ?></span>
                    </div>
                    <div class="product-details-box">
                        <span class="proicon mdi mdi-calendar-month"></span><span><?php echo e(date('d F Y',$product->created_at)); ?></span>
                    </div>
                    <div class="product-details-box">
                        <span class="proicon mdi mdi-database"></span><span>
                            <?php echo e($MB); ?>

                            <?php echo e(trans('main.mb')); ?>

                        </span>
                    </div>
                    <div class="product-details-box">
                        <span class="proicon mdi mdi-headset"></span>
                        <span>
                            <?php if($product->support == 1): ?>
                                <?php echo e('Vendor supports this course'); ?>

                            <?php else: ?>
                                <?php echo e('Vendor doesnt support this course'); ?>

                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="product-price-box">
                        <span class="proicon mdi mdi-wallet"></span>
                        <?php if(isset($meta['price']) && $product->price != 0): ?>
                            <span id="buy-price"><?php echo e(currencySign()); ?><?php echo e(price($product->id,$product->category_id,$meta['price'])['price']); ?></span>
                        <?php else: ?>
                            <span id="buy-price"><?php echo e(trans('main.free')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="h-10"></div>
                    <?php if(isset($meta['price'])): ?>
                        <div class="product-buy-selection">
                            <form>
                                <?php echo e(csrf_field()); ?>

                                <?php if(isset($user) && $product->user_id == $user['id']): ?>
                                    <a class="btn btn-orange product-btn-buy sbox3" id="buy-btn" href="/user/content/edit/<?php echo e($product->id); ?>"><?php echo e(trans('main.edit_course')); ?></a>
                                    <a class="btn btn-blue product-btn-buy sbox3" id="buy-btn" href="/user/content/part/list/<?php echo e($product->id); ?>"><?php echo e(trans('main.add_video')); ?></a>
                                <?php elseif(!$buy): ?>
                                    <?php if(!empty($product->price) and $product->price != 0): ?>
                                        <div class="radio">
                                            <input type="radio" id="radio-2" name="buy_mode" data-mode="download" value="<?php echo e(price($product->id,$product->category_id,$meta['price'])['price']); ?>" checked>
                                            <label class="radio-label" for="radio-2"><?php echo e(trans('main.purchase_download')); ?></label>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($product->post == 1 && userMeta($product->user_id,'trip_mode') == 0): ?>
                                        <?php if(!empty($product->price) and $product->price != 0): ?>
                                            <div class="radio">
                                                <input type="radio" id="radio-1" data-mode="post" value="<?php echo e(price($product->id,$product->category_id,$meta['post_price'])['price']); ?>" name="buy_mode">
                                                <label class="radio-label" for="radio-1"><?php echo e(trans('main.postal_purchase')); ?></label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if(!empty($product->price) and $product->price != 0): ?>
                                        <a class="btn btn-orange product-btn-buy sbox3" id="buy-btn" data-toggle="modal" data-target="#buyModal" href=""><?php echo e(trans('main.pay')); ?></a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if(!empty($product->price) and $product->price != 0): ?>
                                        <a class="btn btn-orange product-btn-buy sbox3" href="javascript:void(0);"><?php echo e(trans('main.purchased_item')); ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </form>
                        </div>
                    <?php endif; ?>
                    <div class="h-10 visible-xs"></div>
                    <?php if(userMeta($product->user_id,'trip_mode') == 1 && userMeta($product->user_id,'trip_mode_date') > 0): ?>
                        <div class="h-20"></div>
                        <div class="trip_mode_alert">
                            <span class="mdi mdi-shield-airplane"></span>
                            <span> <?php echo e(trans('main.vendor_vac')); ?>

                                <?php echo e(date('Y-m-d', userMeta($product->user_id,'trip_mode_date'))); ?>

                                <?php echo e(trans('main.vendor_vac_2')); ?> </span>
                        </div>
                    <?php endif; ?>
                </div>
                <div id="buyModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><?php echo e(trans('main.purchase')); ?></h4>
                            </div>
                            <div class="modal-body">
                                <p><?php echo e(trans('main.select_payment_method')); ?></p>
                                <p>
                                    <input type="hidden" id="buy_method" value="download">
                                <div class="radio">
                                    <input type="radio" class="buy-mode" id="mode-1" value="credit" name="buyMode">
                                    &nbsp;
                                    <label class="radio-label" for="mode-1"><?php echo e(trans('main.account_charge')); ?>&nbsp;<b id="credit-remain-modal">(<?php echo e(currencySign()); ?><?php echo e($user['credit']); ?>)</b></label>
                                </div>
                                <?php if(get_option('gateway_paypal') == 1): ?>
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-2" value="paypal" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-2"> Paypal </label>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_option('gateway_paystack',0) == 1): ?>
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-3" value="paystack" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-3"> Paystack </label>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_option('gateway_paytm') == 1): ?>
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-4" value="paytm" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-4"> Paytm </label>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_option('gateway_payu') == 1): ?>
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-5" value="payu" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-5"> Payu </label>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_option('gateway_razorpay') == 1): ?>
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-6" value="razorpay" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-6"> Razorpay </label>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_option('gateway_cinetpay') == 1): ?>
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-6" value="cinetpay" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-6"> Cinetpay </label>
                                    </div>
                                <?php endif; ?>
                                <?php if(get_option('gateway_stripe') == 1): ?>
                                    <div class="radio">
                                        <input type="radio" class="buy-mode" id="mode-7" value="stripe" name="buyMode">
                                        &nbsp;
                                        <label class="radio-label" for="mode-7"> Stripe </label>
                                    </div>
                                <?php endif; ?>
                                <div class="h-10"></div>
                                <div class="table-responsive table-base-price">
                                    <table class="table table-hover table-factor-modal">
                                        <thead>
                                        <tr>
                                            <th class="text-center"><?php echo e(trans('main.amount')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.discount')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.tax')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.total_amount')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center"><?php echo e($meta['price']); ?></td>
                                            <?php if(isset($meta['price']) && $meta['price'] > 0 && price($product->id, $product->category->id, $meta['price']) > 0): ?>
                                                <td class="text-center"><?php echo e(round((($meta['price'] - price($product->id, $product->category->id, $meta['price'])['price']) * 100) / $meta['price'])); ?></td>
                                            <?php endif; ?>
                                            <td class="text-center">0</td>
                                            <td class="text-center"><?php echo e(price($product->id,$product->category->id,$meta['price'])['price']); ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive table-post-price table-post-price-s">
                                    <table class="table table-hover table-factor-modal" style="margin-bottom: 0;padding-bottom: 0;">
                                        <thead>
                                        <tr>
                                            <th class="text-center"><?php echo e(trans('main.amount')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.discount')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.tax')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.total_amount')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="text-center"><?php echo e($meta['post_price']); ?></td>
                                            <?php if(isset($meta['post_price']) && $meta['post_price']>0): ?>
                                                <td class="text-center"><?php echo e(round((($meta['post_price'] - price($product->id,$product->category->id,$meta['post_price'])['price']) * 100) / $meta['post_price'])); ?></td>
                                                <td class="text-center">۰</td>
                                                <td class="text-center">۰</td>
                                                <td class="text-center"><?php echo e(price($product->id,$product->category->id,$meta['post_price'])['price']); ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </p>
                            </div>
                            <div class="modal-body">
                                <div id="postAddressText">

                                    <?php if(isset($user)): ?>
                                        <p><b><?php echo e(trans('main.address')); ?></b><?php echo userAddress($user['id']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div id="postAddress">
                                    <form method="post" class="form-horizontal" action="/user/profile/meta/store">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="form-group">
                                                <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.province')); ?></label>
                                                <div class="col-md-5 tab-con">
                                                    <input type="text" class="form-control" name="state" value="<?php echo $userMeta['state'] ?? ''; ?>"/>
                                                </div>
                                                <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.city')); ?></label>
                                                <div class="col-md-5 tab-con">
                                                    <input type="text" name="city" value="<?php echo e($userMeta['city'] ?? ''); ?>" class="form-control">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.address')); ?></label>
                                                <div class="col-md-5 tab-con">
                                                    <textarea name="address" rows="4" class="form-control"><?php echo e($userMeta['address'] ?? ''); ?></textarea>
                                                </div>
                                                <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.zip_code')); ?></label>
                                                <div class="col-md-5 tab-con">
                                                    <input type="text" name="postalcode" value="<?php echo e($userMeta['postalcode'] ?? ''); ?>" class="form-control text-center">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="submit" name="submit" class="btn btn-orange pull-left" value="Save">
                                                </div>
                                            </div>
                                        </form>
                                </div>
                                <div id="giftCard">
                                    <form method="post" class="form-horizontal">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="form-group">
                                            <div class="col-md-9 tab-con">
                                                <input type="text" dir="ltr" class="form-control text-center" placeholder="Discount or Gift code" name="gift-card" id="gift-card">
                                            </div>
                                            <div class="col-md-3 tab-con">
                                                <button type="button" name="gift-card-check" id="gift-card-check" class="btn btn-custom pull-left"><?php echo e(trans('main.validate')); ?></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-center" id="gift-card-result"></div>
                                        </div>
                                    </form>
                                </div>
                                <?php if(isset($user)): ?>
                                    <div id="modal-user-category">
                                        <span><?php echo e(trans('main.you_are_in')); ?></span>
                                        <b><?php echo e($user['category']['title']); ?></b>
                                        <span><?php echo e(trans('main.group_and')); ?></span>
                                        <b><?php echo e($user['category']['off']); ?>٪</b>
                                        <span> <?php echo e(trans('main.extra_discount')); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if(checkSubscribeSell($product)): ?>
                                <div class="modal-body">
                                    <h6 style="font-weight:bold;">You Can Subscribe..... Select Items</h6>
                                    <div class="h-10"></div>
                                    <?php if($product->price_3 > 0): ?><a href="/product/subscribe/<?php echo $product->id; ?>/3/credit" p-id="<?php echo $product->id; ?>" s-type="3" class="btn-subscribe btn btn-custom">3 month : <?php echo currencySign(); ?><?php echo $product->price_3; ?></a><?php endif; ?>
                                    <?php if($product->price_6 > 0): ?><a href="/product/subscribe/<?php echo $product->id; ?>/6/credit" p-id="<?php echo $product->id; ?>" s-type="6" class="btn-subscribe btn btn-custom">6 month : <?php echo currencySign(); ?><?php echo $product->price_6; ?></a><?php endif; ?>
                                    <?php if($product->price_9 > 0): ?><a href="/product/subscribe/<?php echo $product->id; ?>/9/credit" p-id="<?php echo $product->id; ?>" s-type="9" class="btn-subscribe btn btn-custom">9 month : <?php echo currencySign(); ?><?php echo $product->price_9; ?></a><?php endif; ?>
                                    <?php if($product->price_12 > 0): ?><a href="/product/subscribe/<?php echo $product->id; ?>/12/credit" p-id="<?php echo $product->id; ?>" s-type="12" class="btn-subscribe btn btn-custom">12 month : <?php echo currencySign(); ?><?php echo $product->price_12; ?></a><?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-custom pull-left" data-dismiss="modal"><?php echo e(trans('main.cancel')); ?></button>
                                <a href="javascript:void(0);" class="btn btn-custom pull-left" id="buyBtn"><?php echo e(trans('main.purchase')); ?></a>
                                <a href="javascript:void(0);" class="btn btn-custom pull-right" id="btn-address" onclick="$('#postAddress').slideToggle(200);"><?php echo e(trans('main.change_address')); ?></a>
                                <a href="javascript:void(0);" class="btn btn-custom pull-right" onclick="$('#giftCard').slideToggle(200);"><?php echo e(trans('main.have_giftcard')); ?></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 col-xs-12 video-details">
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-md-2 col-xs-12"></div>
                        <div class="col-md-8 col-xs-12">
                            <?php if(isset($part) && $part->server == 'youtube'): ?>
                                <iframe width="100%" height="435" src="<?php echo e(!empty($partVideo) ? $partVideo : $meta['video']); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php elseif(isset($part) && $part->server == 'vimeo'): ?>
                                <iframe src="<?php echo e(!empty($partVideo) ? $partVideo : $meta['video']); ?>" width="100%" height="435" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                            <?php else: ?>
                            <video id="myDiv" controls style="max-height: 300px;">
                                <source src="<?php echo e(!empty($partVideo) ? $partVideo : $meta['video']); ?>" type="video/mp4"/>
                            </video>
                            <?php endif; ?>
                            <div class="video-details-section">
                                <?php if(count($product->favorite) > 0): ?>
                                    <a title="Remove from favorites" href="/product/unfav/<?php echo e($product->id); ?>">
                                        <span class="playericon mdi mdi-star-off"></span>
                                    </a>
                                <?php else: ?>
                                    <a title="Add to favorites" href="/product/fav/<?php echo e($product->id); ?>">
                                        <span class="playericon mdi mdi-star"></span>
                                    </a>
                                <?php endif; ?>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo url()->current(); ?>" target="_blank" title="Share">
                                    <span class="playericon mdi mdi-share-variant"></span>
                                </a>
                                <a href="javascript:void(0);" class="course-id-s" title="Course Id.">
                                    <span class="playericon mdi mdi-library-video"></span>
                                    vt-<?php echo e($product->id); ?>

                                </a>
                                <a class="pull-left views-s" title="Views" href="javascript:void(0)">
                                    <span><?php echo e($product->view); ?></span>
                                    <span class="playericon mdi mdi-eye"></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-12"></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-20"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="col-md-4 col-xs-12">
                    <div class="row">
                        <?php if($live): ?>
                            <?php $__currentLoopData = $live; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="course_details">
                                    <div class="product-user-box text-left">
                                        <h6 class="text-left">
                                            <span style="text-align: left !important;"><?php echo $l->title ?? ''; ?></span>
                                        </h6>
                                        <div class="h-10"></div>
                                        <span style="text-align: left !important;margin: 0;">
                                            <i class="proicon mdi mdi-calendar"></i>
                                            <?php echo $l->date; ?>&nbsp;<?php echo $l->time ?? ''; ?>

                                        </span>
                                        <span style="text-align: left !important;margin: 0;">
                                            <i class="proicon mdi mdi-clock"></i>
                                            <?php echo $l->duration; ?>&nbsp;<?php echo trans('admin.minutes'); ?>

                                        </span>
                                        <?php if($l->password != null && $l->password != ''): ?>
                                            <span style="text-align: left !important;margin: 0;">
                                                <i class="proicon mdi mdi-key"></i>
                                                <?php echo $l->password; ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-user-box-footer">
                                        <a href="<?php echo $l->join_url ?? ''; ?>" target="_blank"><?php echo e(trans('main.enter_live_class')); ?></a>
                                    </div>
                                    <div class="h-25"></div>
                                </div>
                                <div class="h-10"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="course_details">
                            <div class="product-user-box">
                                <?php $userMetas = arrayToList($product->user->usermetas, 'option', 'value'); ?>
                                <img alt="<?php echo e($product->user->username ?? ''); ?>" class="img-box" src="<?php echo e(!empty($userMetas['avatar']) ? $userMetas['avatar'] : get_option('default_user_avatar','')); ?>" class="img-responsive"/>
                                <h3>
                                    <a href="/profile/<?php echo e($product->user->id); ?>"><span><?php echo e($product->user->name); ?></span></a>
                                </h3>
                                <div class="user-description-box">
                                    <?php echo e($userMetas['short_biography']); ?>

                                </div>
                                <div class="text-center">
                                    <?php $__currentLoopData = $rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($rate['image'])): ?>
                                            <img class="img-icon img-icon-s" src="<?php echo e($rate['image']); ?>" title="<?php echo e($rate['description']); ?>"/>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="product-user-box-footer">
                                <a href="/profile/<?php echo e($product->user->id); ?>"><?php echo e(trans('main.vendor_profile')); ?></a>
                            </div>
                            <div class="h-25"></div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if(isset($ads)): ?>
                            <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($ad->position == 'product-page'): ?>
                                    <a href="<?php echo e($ad->url); ?>"><img src="<?php echo e($ad->image); ?>" class="<?php echo e($ad->size); ?>" id="ppage-s"></a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 product-part-container">
                    <div class="user-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <?php if(count($parts) > 0): ?>
                                <li class="active"><a href="#tab1" role="tab" data-toggle="tab"><?php echo e(trans('main.course_content')); ?></a></li>
                            <?php endif; ?>
                            <?php if($product->type == 'webinar' || $product->type == 'course+webinar'): ?>
                                <li <?php if(count($parts) == 0): ?> class="active" <?php endif; ?>><a href="#tab6" role="tab" data-toggle="tab"><?php echo e(trans('main.meeting')); ?></a></li>
                            <?php endif; ?>
                            <li><a href="#tab2" role="tab" data-toggle="tab"><?php echo e(trans('main.details')); ?></a></li>
                            <?php if(count($precourse) > 0): ?>
                                <li><a href="#tab3" role="tab" data-toggle="tab"><?php echo e(trans('main.prerequisites')); ?></a></li>
                            <?php endif; ?>
                            <?php if(!empty($product->quizzes) and !$product->quizzes->isEmpty()): ?>
                                <li><a href="#tab4" role="tab" data-toggle="tab"><?php echo e(trans('main.quizzes')); ?></a></li>
                            <?php endif; ?>
                            <?php if(!empty($product->quizzes) and !$product->quizzes->isEmpty() and $hasCertificate): ?>
                                <li><a href="#tab5" role="tab" data-toggle="tab"><?php echo e(trans('main.certificates')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="<?php if(count($parts) > 0): ?> active in <?php endif; ?> tab-pane fade" id="tab1">
                                <ul class="part-ul">
                                    <?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="part-links">
                                                <a <?php if($product->content_type == 'captivate'): ?> href="/product/captivate/<?php echo e($product->id); ?>/<?php echo e($part['id']); ?>" target="_blank" <?php else: ?> href="/product/part/<?php echo e($product->id); ?>/<?php echo e($part['id']); ?>" <?php endif; ?>>
                                                    <div class="col-md-1 hidden-xs tab-con">
                                                        <?php if($buy or $part['free'] == 1): ?>
                                                            <span class="playicon mdi mdi-play-circle"></span>
                                                        <?php else: ?>
                                                            <span class="playicon mdi mdi-lock"></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="<?php if($product->download == 1): ?> col-md-4 <?php else: ?> col-md-5 <?php endif; ?> col-xs-10 tab-con">
                                                        <label><?php echo e($part['title']); ?></label>
                                                    </div>
                                                </a>
                                                <div class="col-md-2 tab-con">
                                                    <span class="btn btn-gray btn-description hidden-xs" data-toggle="modal" href="#description-<?php echo e($part['id']); ?>"><?php echo e(trans('main.description')); ?></span>
                                                    <div class="modal fade" id="description-<?php echo e($part['id']); ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal" aria-hidden="true">
                                                                        &times;
                                                                    </button>
                                                                    <h4 class="modal-title"><?php echo e(trans('main.description')); ?></h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php echo $part['description']; ?>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-custom pull-left" data-dismiss="modal"><?php echo e(trans('main.close')); ?></button>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </div>
                                                <div class="col-md-2 text-center hidden-xs tab-con">
                                                    <span><?php echo e($part['size']); ?> <?php echo e(trans('main.mb')); ?></span>
                                                </div>
                                                <div class="col-md-2 hidden-xs tab-con">
                                                    <span><?php echo e($part['duration']); ?> <?php echo e(trans('main.minute')); ?></span>
                                                </div>
                                                <?php if($product->download == 1 && $product->content_type != 'captivate'): ?>
                                                    <div class="col-md-1 col-xs-2 tab-con">
                                                        <span class="download-part" data-href="/video/download/<?php echo e($part['id']); ?>"><span class="mdi mdi-arrow-down-bold"></span></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($meta['document']) and $meta['document']!=''): ?>
                                        <li class="document">
                                            <div class="col-md-1">
                                                <span class="clip"></span>
                                            </div>
                                            <div class="col-md-10 text-left" style="text-align: left;">
                                                <label><?php echo e(trans('main.documents')); ?></label>
                                            </div>
                                            <div class="col-md-1 text-center">
                                                <span class="download-part" data-href="<?php echo e($meta['document']); ?>"><span class="mdi mdi-arrow-down-bold"></span></span>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <span><?php echo $product->content ?? ''; ?></span>
                            </div>
                            <div class="tab-pane fade in tab-body" id="tab3">
                                <?php $__currentLoopData = $precourse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $pmeta = arrayToList($pc->metas, 'option', 'value'); ?>
                                    <div class="col-md-4 col-xs-12 tab-con">
                                        <a href="/product/<?php echo e($pc->id); ?>" title="<?php echo e($pc->title); ?>" class="content-box content-box-r">
                                            <img alt="<?php echo $pc->title ?? ''; ?>" src="<?php echo e($pmeta['thumbnail']); ?>"/>
                                            <h3><?php echo truncate($pc->title,25); ?></h3>
                                            <div class="footer">
                                                <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                <label class="pull-left"><?php echo e(currencySign()); ?><?php echo e(price($pc->id,$pc->category_id,$pmeta['price'])['price']); ?></label>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="tab-pane fade" id="tab4">
                                <?php if(!empty($product->quizzes) and !$product->quizzes->isEmpty()): ?>
                                    <?php if(!auth()->check()): ?>
                                        <div class="col-xs-12 text-center support-lock support-lock-s">
                                            <span><?php echo e(trans('main.login_to_quiz')); ?></span>
                                            <br>
                                            <span class="mdi mdi-lock"></span>
                                        </div>
                                    <?php else: ?>
                                        <ul class="part-ul">
                                            <li class="row" style="background-color: #343871;color: #ffffff">
                                                <div class="col-md-3 text-center hidden-xs tab-con">
                                                    <span><?php echo e(trans('main.quiz_name')); ?></span>
                                                </div>
                                                <div class="col-md-2 text-center hidden-xs tab-con">
                                                    <span><?php echo e(trans('main.time')); ?></span>
                                                </div>

                                                <div class="col-md-3 text-center hidden-xs tab-con">
                                                    <span><?php echo e(trans('main.questions')); ?></span>
                                                </div>

                                                <div class="col-md-2 text-center hidden-xs tab-con">
                                                    <span><?php echo e(trans('main.grade')); ?></span>
                                                </div>

                                                <div class="col-md-2 text-center hidden-xs tab-con">
                                                    <span><?php echo e(trans('main.controls')); ?></span>
                                                </div>
                                            </li>

                                            <?php $__currentLoopData = $product->quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="row">
                                                    <div class="col-md-3 text-center hidden-xs tab-con">
                                                        <span><?php echo e($quiz->name); ?></span>
                                                        <?php if($quiz->certificate): ?>
                                                            <small style="display: block"><?php echo e(trans('main.certificate_include')); ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-2 text-center hidden-xs tab-con">
                                                        <span><?php echo e((!empty($quiz->time)) ? $quiz->time : trans('main.unlimited')); ?></span>
                                                    </div>

                                                    <div class="col-md-3 text-center hidden-xs tab-con">
                                                        <span><?php echo e(count($quiz->questions)); ?></span>
                                                    </div>

                                                    <div class="col-md-2 text-center hidden-xs tab-con">
                                                        <span style="color: <?php echo e($quiz->result_status == 'pass' ? 'green' : ($quiz->result_status == 'fail' ? 'red' : 'black')); ?>"><?php echo e(( isset($quiz->user_grade)) ? $quiz->user_grade : 'No grade'); ?></span>
                                                    </div>

                                                    <div class="col-md-2 text-center hidden-xs tab-con">
                                                        <?php if($quiz->can_try): ?>
                                                            <a href="<?php echo e(($quiz->can_try) ? '/user/quizzes/'. $quiz->id .'/start' : ''); ?>" <?php echo e((!$quiz->can_try) ? 'disabled="disabled"' : ''); ?> class="btn btn-success btn-round">quizzes</a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e('/user/quizzes/'. $quiz->id .'/review'); ?>" class="btn btn-warning btn-round">Review</a>
                                                        <?php endif; ?>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="tab-pane fade" id="tab5">
                                <?php if(!empty($product->quizzes) and !$product->quizzes->isEmpty() and $hasCertificate and $canDownloadCertificate): ?>
                                    <?php if(!auth()->check()): ?>
                                        <div class="col-xs-12 text-center support-lock support-lock-s">
                                            <span><?php echo e(trans('main.login_to_quiz')); ?></span>
                                            <br>
                                            <span class="mdi mdi-lock"></span>
                                        </div>
                                    <?php else: ?>
                                        <ul class="part-ul">
                                            <li class="row" style="background-color: #343871;color: #ffffff">
                                                <div class="col-md-3 text-center hidden-xs tab-con">
                                                    <span><?php echo e(trans('main.quiz_name')); ?></span>
                                                </div>
                                                <div class="col-md-2 text-center hidden-xs tab-con">
                                                    <span><?php echo e(trans('main.quiz_pass_mark')); ?></span>
                                                </div>

                                                <div class="col-md-3 text-center hidden-xs tab-con">
                                                    <span><?php echo e(trans('main.you_grade')); ?></span>
                                                </div>

                                                <div class="col-md-2 text-center hidden-xs tab-con">
                                                    <span><?php echo e(trans('main.download')); ?></span>
                                                </div>
                                            </li>

                                            <?php $__currentLoopData = $product->quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($quiz->result_status) and $quiz->result_status == 'pass'): ?>
                                                    <li class="row">
                                                        <div class="col-md-3 text-center hidden-xs tab-con">
                                                            <span><?php echo e($quiz->name); ?></span>
                                                        </div>
                                                        <div class="col-md-2 text-center hidden-xs tab-con">
                                                            <span><?php echo e($quiz->pass_mark); ?></span>
                                                        </div>

                                                        <div class="col-md-3 text-center hidden-xs tab-con">
                                                            <span><?php echo e($quiz->user_grade); ?></span>
                                                        </div>

                                                        <div class="col-md-2 text-center hidden-xs tab-con">
                                                            <a href="/user/certificates/<?php echo e($quiz->result->id); ?>/download" class="btn btn-success"><?php echo e(trans('main.download_certificate')); ?></a>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <div class="<?php if(count($parts) == 0): ?> active in <?php endif; ?> tab-pane fade" id="tab6">
                                <table class="table table-hover table-bordered" style="margin-bottom: 0;">
                                    <thead>
                                        <th class="text-center"><?php echo trans('main.title'); ?></th>
                                        <th class="text-center"><?php echo trans('main.date'); ?>/<?php echo trans('main.time'); ?></th>
                                        <th class="text-center"><?php echo trans('main.duration'); ?></th>
                                        <th class="text-center"><?php echo trans('main.status'); ?></th>
                                    </thead>
                                	<tbody>
                                    <?php $__currentLoopData = $product->meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"><b><?php echo $meeting->title ?? ''; ?></b></td>
                                            <td class="text-center"><?php echo $meeting->date ?? ''; ?> <?php echo $meeting->time ?? ''; ?></td>
                                            <td class="text-center"><?php echo $meeting->duration ?? ''; ?>&nbsp;<?php echo trans('admin.minutes'); ?></td>
                                            <td class="text-center"><?php echo $meeting->mode ?? ''; ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                	</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="h-20"></div>
                    <div class="user-tabs">
                        <ul class="nav nav-tabs back-blue" role="tablist">
                            <li class="active"><a href="#vtab1" role="tab" data-toggle="tab"><?php echo e(trans('main.similar_courses')); ?></a></li>
                            <li><a href="#vtab2" role="tab" data-toggle="tab"><?php echo e(trans('main.vendor_courses')); ?></a></li>
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="active tab-pane fade in tab-body" id="vtab1">
                                <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $rmeta = arrayToList($rel->metas, 'option', 'value'); ?>
                                    <div class="col-md-4 col-xs-12 tab-con">
                                        <a href="/product/<?php echo e($rel->id); ?>" title="<?php echo e($rel->title); ?>" class="content-box content-box-r">
                                            <img alt="<?php echo e($rel->title ?? ''); ?>" src="<?php echo e($rmeta['thumbnail']); ?>"/>
                                            <h3><?php echo truncate($rel->title,25); ?></h3>
                                            <div class="footer">
                                                <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                <label class="pull-left"><?php echo e(currencySign()); ?><?php echo e(price($rel->id,$rel->category_id,$rmeta['price'])['price']); ?></label>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="tab-pane fade tab-body" id="vtab2">
                                <?php $__currentLoopData = $product->user->contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($puc->id != $product->id): ?>
                                        <?php $umeta = arrayToList($puc->metas, 'option', 'value'); ?>
                                        <div class="col-md-4 col-xs-12 tab-con">
                                            <a href="/product/<?php echo e($puc->id); ?>" title="<?php echo e($puc->title); ?>" class="content-box content-box-r">
                                                <img alt="<?php echo e($puc->title ?? ''); ?>" src="<?php echo e($umeta['thumbnail']); ?>"/>
                                                <h3><?php echo truncate($puc->title,25); ?></h3>
                                                <div class="footer">
                                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                    <label class="pull-left"><?php echo e(currencySign()); ?><?php echo e(price($puc->id,$puc->category_id,$umeta['price'])['price']); ?></label>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="h-20" id="blog-comment-scroll"></div>
                    <div class="user-tabs">
                        <ul class="nav nav-tabs back-green" role="tablist">
                            <li class="active"><a href="#ctab1" role="tab" data-toggle="tab"><?php echo e(trans('main.comments')); ?>&nbsp;(<?php echo e($product->comments_count); ?>)</a></li>
                            <?php if($product->support == 1): ?>
                                <?php if(!empty($product->supports->sum('rate')) and $product->supports->sum('rate') > 0 and !empty($product->supports) and count($product->supports) > 0): ?>
                                    <li><a href="#ctab2" role="tab" data-toggle="tab">Support &nbsp;(Rating: <?php echo e($product->support_rate); ?>)</a></li>
                                <?php else: ?>
                                    <li><a href="#ctab2" role="tab" data-toggle="tab"><?php echo e(trans('main.support')); ?></a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="active tab-pane fade in blog-comment-section body-target-s" id="ctab1">
                                <?php if(isset($user)): ?>
                                    <form method="post" action="/product/comment/store/<?php echo e($product->id); ?>">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="content_id" value="<?php echo e($product->id); ?>"/>
                                        <input type="hidden" name="parent" value="0"/>
                                        <div class="form-group">
                                            <label><?php echo e(trans('main.your_comment')); ?></label>
                                            <textarea class="form-control" name="comment" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-custom" value="Send">
                                        </div>
                                    </form>
                                <?php else: ?>
                                    <div class="col-xs-12 text-center support-lock support-lock-s">
                                        <span><?php echo e(trans('main.login_to_comment')); ?></span>
                                        <br>
                                        <span class="mdi mdi-lock"></span>
                                    </div>
                                <?php endif; ?>
                                <ul class="comment-box support-list1">
                                    <?php $__currentLoopData = $product->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($comment->parent == 0): ?>
                                            <?php $userMeta = arrayToList($comment->user->usermetas, 'option', 'value'); ?>
                                            <li class="user-metas">
                                                <img alt="<?php echo e($comment->user->username ?? ''); ?>" src="<?php echo e($userMeta['avatar'] ?? '/assets/default/images/user.png'); ?>" />
                                                <a href="/profile/<?php echo e($comment->user_id); ?>"><?php echo e($comment->name); ?> <?php if($comment->user->buys_count > 0): ?> <b class="green-s">(<?php echo e(trans('main.student')); ?>)</b> <?php elseif($comment->user->contents_count > 0): ?> <b class="blue-s">(<?php echo e(trans('main.vendor')); ?>)</b> <?php else: ?>  <b class="gray-s">(<?php echo e(trans('main.user')); ?>)</b> <?php endif; ?></a>
                                                <label class="pull-left"><?php echo e(date('d F Y | H:i',$comment->created_at)); ?></label>
                                                <span><?php echo $comment->comment; ?></span>
                                                <?php if($buy or (isset($user) and $product->user_id == $user['id'])): ?><span><a href="javascript:void(0);" answer-id="<?php echo e($comment->id); ?>" answer-title="<?php echo e($comment->name); ?>" class="pull-left answer-btn"><?php echo e(trans('main.reply')); ?></a> </span><?php endif; ?>
                                            </li>
                                            <?php if(count($comment->childs) > 0): ?>
                                                <ul class="col-md-11 col-md-offset-1 answer-comment">
                                                    <?php $__currentLoopData = $comment->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php $cuserMeta = arrayToList($child->user->usermetas, 'option', 'value'); ?>
                                                        <li>
                                                            <img alt="<?php echo e($child->user->username ?? ''); ?>" src="<?php echo e(!empty($cuserMeta['avatar']) ? $cuserMeta['avatar'] : '/assets/default/images/user.png'); ?>"/>
                                                            <a href="/profile/<?php echo e($child->user_id); ?>"><?php echo e($child->name); ?> <?php if($child->user->buys_count > 0): ?> <b class="green-s">(<?php echo e(trans('main.customer')); ?>)</b> <?php elseif($child->user->contents_count > 0): ?> <b class="blue-s">(<?php echo e(trans('main.vendor')); ?>)</b> <?php else: ?> <b class="gray-s">(<?php echo e(trans('main.user')); ?>)</b> <?php endif; ?></a>
                                                            <label class="pull-left"><?php echo e(date('d F Y | H:i',$child->created_at)); ?></label>
                                                            <span><?php echo $child->comment; ?></span>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(count($product->comments) > 4): ?>
                                        <span class="btn btn-custom pull-left" id="loadMore1"><?php echo e(trans('main.load_more')); ?></span>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php if($product->support == 1): ?>
                                <div class="tab-pane fade blog-comment-section body-target-s" id="ctab2">
                                    <?php if($buy || $product->price == 0): ?>
                                        <form method="post" action="/product/support/store">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="content_id" value="<?php echo e($product->id); ?>"/>
                                            <div class="form-group">
                                                <label><?php echo e(trans('main.private_conversation')); ?></label>
                                                <textarea class="form-control" name="comment" rows="4" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-custom" value="Send">
                                            </div>
                                        </form>
                                    <?php elseif(isset($user) && $product->user_id == $user['id']): ?>
                                        <div class="col-xs-12 text-center support-lock">
                                            <span><?php echo e(trans('main.support_address')); ?></span>
                                            <a href="/user/ticket/support?openid=<?php echo e($product->id); ?>"><?php echo e(trans('main.panel_support')); ?></a>
                                            <span><?php echo e(trans('main.support_students')); ?></span>
                                            <br>
                                            <span class="mdi mdi-lock"></span>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-xs-12 text-center support-lock">
                                            <span><?php echo e(trans('main.support_only_students')); ?></span>
                                            <br>
                                            <span class="mdi mdi-lock"></span>
                                        </div>
                                    <?php endif; ?>
                                    <ul class="comment-box support-list">
                                        <?php $__currentLoopData = $product->supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($user) and $support->sender_id == $user['id']): ?>
                                                <?php if($support->supporter_id != $support->user_id): ?>
                                                    <?php $senderMeta = arrayToList($support->sender->usermetas, 'option', 'value'); ?>
                                                    <li class="user-metas">
                                                        <img src="<?php echo e(!empty($senderMeta['avatar']) ? $senderMeta['avatar'] : '/assets/default/images/user.png'); ?>" alt="<?php echo e($support->user->username ?? ''); ?>"/>
                                                        <a href="/profile/<?php echo e($support->user_id); ?>"><?php echo e($support->name); ?></a>
                                                        <label class="pull-left">
                                                            <?php echo e(date('d F Y | H:i',$support->created_at)); ?>

                                                        </label>
                                                        <span><?php echo $support->comment; ?></span>
                                                    </li>
                                                <?php else: ?>
                                                    <?php $senderMeta = arrayToList($support->supporter->usermetas, 'option', 'value'); ?>
                                                    <li class="user-metas">
                                                        <img src="<?php echo e(!empty($senderMeta['avatar']) ? $senderMeta['avatar'] : '/assets/default/images/user.png'); ?>" alt="<?php echo e($support->user->username ?? ''); ?>"/>
                                                        <a href="/profile/<?php echo e($support->user_id); ?>"><?php echo e($support->name); ?></a>
                                                        <label class="pull-left text-center">
                                                            <?php echo e(date('d F Y | H:i',$support->created_at)); ?>

                                                            <br>
                                                            <div class="userraty urating" data-score="<?php echo e($support->rate); ?>" data-id="<?php echo e($support->id); ?>"></div>
                                                        </label>
                                                        <span><?php echo $support->comment; ?></span>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($buy && count($product->supports)>4): ?>
                                            <span class="btn btn-custom pull-left" id="loadMore"><?php echo e(trans('main.load_more')); ?></span>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-30"></div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="/assets/default/view/fluid-player-master/fluidplayer.min.js"></script>
    <script>
        $(function () {
            fluidPlayer("myDiv", {
                layoutControls: {
                    posterImage: '<?php echo !empty($meta['cover']) ? $meta['cover'] : ''; ?>',
                    logo: {
                        imageUrl: '<?php echo get_option('video_watermark',''); ?>', // Default null
                        position: 'top right', // Default 'top left'
                        clickUrl: '<?php echo url('/'); ?>', // Default null
                        opacity: 0.9, // Default 1
                        imageMargin: '10px', // Default '2px'
                        hideWithControls: true, // Default false
                        showOverAds: 'true' // Default false
                    }
                },
                <?php if(get_option('site_videoads',0) == 1): ?>
                vastOptions: {
                    vastTimeout: <?php echo get_option('site_videoads_time',5) * 1000; ?>,
                    adList: [
                        {
                            roll: '<?php echo get_option('site_videoads_roll_type','preRoll'); ?>',
                            vastTag: '<?php echo get_option('site_videoads_source'); ?>',
                            adText: '<?php echo get_option('site_videoads_title'); ?>',
                        }
                    ]
                }
                <?php endif; ?>
            });
        });
    </script>
    <script>
        $('.raty').raty({
            starType: 'i', score: <?php echo e(($product->rates->avg('rate')) ? $product->rates->avg('rate') : 0); ?>, click: function (rate) {
                window.location = '/product/rate/<?php echo e($product->id ?? ''); ?>/'+ rate;
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.answer-btn').click(function () {
                var parent = $(this).attr('answer-id');
                var title = $(this).attr('answer-title');
                $('input[name="parent"]').val(parent);
                scrollToAnchor('.back-green');
                $('textarea').attr('placeholder', ' Replied to ' + title);
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.download-part').click(function (e) {
                e.preventDefault();
                window.location = $(this).attr('data-href');
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type=radio][name=buy_mode]').change(function () {
                $('#buy-price').html($(this).val() + ' <?php echo currencySign(); ?> ');
                $('#buy_method').val($(this).attr('data-mode'));
                $('input[type=radio][name=buyMode]').removeAttr('selected');
                $('#buyBtn').attr('href', '#');
                if ($(this).attr('data-mode') == 'post') {
                    $('.table-base-price').hide();
                    $('.table-post-price').show();
                } else {
                    $('.table-base-price').show();
                    $('.table-post-price').hide();
                }
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input[type=radio][name=buyMode]').change(function () {
                var buyLink = '/bank/' + $(this).val() + '/pay/<?php echo e($product->id); ?>/' + $('#buy_method').val();
                $('#buyBtn').attr('href', buyLink);
            })
        });
    </script>
    <script>
        $('.userraty').raty({
            starType: 'i',
            score: function () {
                return $(this).attr('data-score');
            },
            click: function (rate) {
                var id = $(this).attr('data-id');
                $.get('/product/support/rate/' + id + '/' + rate, function (data) {
                    if (data == 0) {
                        $.notify({
                            message: 'Sorry rating not submited.'
                        }, {
                            type: 'danger',
                            allow_dismiss: false,
                            z_index: '99999999',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            position: 'fixed'
                        });
                    }
                    if (data == 1) {
                        $.notify({
                            message: 'Rating Submited.'
                        }, {
                            type: 'danger',
                            allow_dismiss: false,
                            z_index: '99999999',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            position: 'fixed'
                        });
                    }
                })
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            var size_li = $(".support-list li").size();
            var x = 5;
            $('.support-list li:lt(' + x + ')').show();
            $('#loadMore').click(function () {
                x = (x + 5 <= size_li) ? x + 5 : size_li;
                $('.support-list li:lt(' + x + ')').show();
                $('#showLess').show();
                if (x == size_li) {
                    $('#loadMore').hide();
                }
            });
            $('#showLess').click(function () {
                x = (x - 5 < 0) ? 3 : x - 5;
                $('.support-list li').not(':lt(' + x + ')').hide();
                $('#loadMore').show();
                $('#showLess').show();
                if (x == 3) {
                    $('#showLess').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            var size_li = $(".support-list1 li").size();
            var x = 5;
            $('.support-list1 li:lt(' + x + ')').show();
            $('#loadMore1').click(function () {
                x = (x + 5 <= size_li) ? x + 5 : size_li;
                $('.support-list1 li:lt(' + x + ')').show();
                $('#showLess1').show();
                if (x == size_li) {
                    $('#loadMore1').hide();
                }
            });
            $('#showLess1').click(function () {
                x = (x - 5 < 0) ? 3 : x - 5;
                $('.support-list1 li').not(':lt(' + x + ')').hide();
                $('#loadMore1').show();
                $('#showLess1').show();
                if (x == 3) {
                    $('#showLess1').hide();
                }
            });
        });
    </script>
    <script>
        $('#buy-btn').click(function () {
            if ($('input[name="buy_mode"]:checked').attr('data-mode') == 'download') {
                $('#btn-address').hide();
                $('#postAddress').slideUp();
                $('#postAddressText').slideUp();

            } else {
                $('#btn-address').show();
                $('#postAddressText').show();
            }
        })
    </script>
    <script>
        $('#gift-card-check').click(function () {
            var code = $('#gift-card').val();
            if (code == '') {
                $.notify({
                    message: 'Please fillout all inputs.'
                }, {
                    type: 'danger',
                    allow_dismiss: false,
                    z_index: '99999999',
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    position: 'fixed'
                });
            } else {
                $('#gift-card-result').html('<div class="loader"></div> Please wait...');
                $.get('/gift/' + code, function (data) {
                    if (data == 0) {
                        $('#gift-card-result').html('<b class="red-r">Sorry code is invalid.</b>');
                    } else {
                        if (data.type == 'gift')
                            $('#gift-card-result').html('<b class="green-s"> Congratulations! <?php echo currencySign(); ?>' + data.off + ' Discount applied successfully!</b>');
                        if (data.type == 'off')
                            $('#gift-card-result').html('<b class="green-s"> Congratulations! %' + data.off + ' Discount applied successfully!</b>');
                    }
                })
            }
        });
    </script>
    <script>
        $('.buy-mode').on('change', function () {
            if ($(this).is(':checked')) {
                let buyMode = $(this).val();
                $('.btn-subscribe').each(function () {
                    let url = '/product/subscribe/' + $(this).attr('p-id') + '/' + $(this).attr('s-type') + '/' + buyMode;
                    $(this).attr('href', url);
                });
            }
        });
    </script>
    <?php if($buy and isset($user)): ?>
        <script>
            usage(<?php echo $product->id; ?>,<?php echo $user['id']; ?>);
        </script>
    <?php endif; ?>
    <?php if($product->discount != null || $product->category->discount != null): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
        <script>
            var Countdown = {
                $el: $('.countdown'),
                countdown_interval: null,
                total_seconds: 18000,
                init: function () {
                    this.$ = {
                        hours: this.$el.find('.bloc-time.hours .figure'),
                        minutes: this.$el.find('.bloc-time.min .figure'),
                        seconds: this.$el.find('.bloc-time.sec .figure')
                    };
                    this.values = {
                        hours: this.$.hours.parent().attr('data-init-value'),
                        minutes: this.$.minutes.parent().attr('data-init-value'),
                        seconds: this.$.seconds.parent().attr('data-init-value'),
                    };
                    this.total_seconds = this.values.hours * 60 * 60 + (this.values.minutes * 60) + this.values.seconds;
                    this.count();
                },
                count: function () {
                    var that = this,
                        $hour_1 = this.$.hours.eq(0),
                        $hour_2 = this.$.hours.eq(1),
                        $min_1 = this.$.minutes.eq(0),
                        $min_2 = this.$.minutes.eq(1),
                        $sec_1 = this.$.seconds.eq(0),
                        $sec_2 = this.$.seconds.eq(1);
                    this.countdown_interval = setInterval(function () {
                        if (that.total_seconds > 0) {
                            --that.values.seconds;
                            if (that.values.minutes >= 0 && that.values.seconds < 0) {
                                that.values.seconds = 59;
                                --that.values.minutes;
                            }
                            if (that.values.hours >= 0 && that.values.minutes < 0) {
                                that.values.minutes = 59;
                                --that.values.hours;
                            }
                            that.checkHour(that.values.hours, $hour_1, $hour_2);
                            that.checkHour(that.values.minutes, $min_1, $min_2);
                            that.checkHour(that.values.seconds, $sec_1, $sec_2);
                            --that.total_seconds;
                        } else {
                            clearInterval(that.countdown_interval);
                        }
                    }, 1000);
                },
                animateFigure: function ($el, value) {
                    var that = this,
                        $top = $el.find('.top'),
                        $bottom = $el.find('.bottom'),
                        $back_top = $el.find('.top-back'),
                        $back_bottom = $el.find('.bottom-back');
                    $back_top.find('span').html(value);
                    $back_bottom.find('span').html(value);
                    TweenMax.to($top, 0.8, {
                        rotationX: '-180deg',
                        transformPerspective: 300,
                        ease: Quart.easeOut,
                        onComplete: function () {
                            $top.html(value);
                            $bottom.html(value);
                            TweenMax.set($top, {rotationX: 0});
                        }
                    });
                    TweenMax.to($back_top, 0.8, {
                        rotationX: 0,
                        transformPerspective: 300,
                        ease: Quart.easeOut,
                        clearProps: 'all'
                    });
                },
                checkHour: function (value, $el_1, $el_2) {
                    var val_1 = value.toString().charAt(0),
                        val_2 = value.toString().charAt(1),
                        fig_1_value = $el_1.find('.top').html(),
                        fig_2_value = $el_2.find('.top').html();

                    if (value >= 10) {
                        if (fig_1_value !== val_1) this.animateFigure($el_1, val_1);
                        if (fig_2_value !== val_2) this.animateFigure($el_2, val_2);
                    } else {
                        if (fig_1_value !== '0') this.animateFigure($el_1, 0);
                        if (fig_2_value !== val_1) this.animateFigure($el_2, val_1);
                    }
                }
            };
            Countdown.init();
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.view.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/view/product/product.blade.php ENDPATH**/ ?>
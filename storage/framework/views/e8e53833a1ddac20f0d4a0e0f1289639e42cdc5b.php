<?php $__env->startSection('pages'); ?>
    <div class="h-20"></div>
    <div class="container-fluid">
        <div class="container">
            <div class="accordion-off col-xs-12">
                <ul id="accordion" class="accordion off-filters-li">
                    <li class="open">
                        <div class="link"><h2><span class="usericon mdi mdi-account"></span><?php echo e(trans('main.account_info')); ?></h2><i class="mdi mdi-chevron-down"></i></div>
                        <ul class="submenu dblock">
                            <div class="h-10"></div>
                            <form method="post" class="form-horizontal" action="/user/profile/store">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.realname')); ?></label>
                                    <div class="col-md-4 tab-con">
                                        <input type="text" name="name" value="<?php echo e(!empty($user['name']) ? $user['name'] : ''); ?>" class="form-control">
                                    </div>
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.email')); ?></label>
                                    <div class="col-md-4 tab-con">
                                        <input type="text" value="<?php echo e(!empty($user['email']) ? $user['email'] : ''); ?>" class="form-control text-left disabled" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" value="Save" class="btn btn-orange pull-left">
                                    </div>
                                </div>
                            </form>
                            <div class="h-10"></div>
                        </ul>
                    </li>
                    <li>
                        <div class="link"><h2><span class="usericon mdi mdi-account-details"></span> <?php echo e(trans('main.personal_info')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                        <ul class="submenu">
                            <div class="h-10"></div>
                            <form method="post" class="form-horizontal" action="/user/profile/meta/store">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.biography')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <textarea name="biography" rows="5" class="form-control res-vertical"><?php echo e(!empty($meta['biography']) ? $meta['biography'] : ''); ?></textarea>
                                    </div>
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.short_biography')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <textarea name="short_biography" maxlength="400" rows="5" class="form-control res-vertical"><?php echo e(!empty($meta['short_biography']) ? $meta['short_biography'] : ''); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.province')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <input type="text" class="form-control" name="state" value="<?php echo !empty($meta['state']) ? $meta['state'] : ''; ?>">
                                    </div>
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.city')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <input type="text" name="city" value="<?php echo e(!empty($meta['city']) ? $meta['city'] : ''); ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.birthday')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <input type="text" name="birthday" value="<?php echo e(!empty($meta['birthday']) ? $meta['birthday'] : ''); ?>" class="form-control">
                                    </div>
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.age')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <input type="text" name="old" value="<?php echo e(!empty($meta['old']) ? $meta['old'] : ''); ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.phone_number')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <input type="text" name="phone" value="<?php echo e(!empty($meta['phone']) ? $meta['phone'] : ''); ?>" class="form-control">
                                    </div>
                                    <?php if(is_array(json_decode(get_option('site_language_select'),true))): ?>
                                        <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.language')); ?></label>
                                        <div class="col-md-5 tab-con">
                                            <select name="language" class="form-control">
                                                <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(in_array($code,json_decode(get_option('site_language_select'),true))): ?>
                                                        <option value="<?php echo $code; ?>" <?php if(isset($meta['language']) && $meta['language'] == $code): ?> selected <?php endif; ?>><?php echo $title; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 tab-con">
                                        <input type="submit" class="btn btn-orange pull-left" value="Save">
                                    </div>
                                </div>
                            </form>
                            <div class="h-10"></div>
                        </ul>
                    </li>
                    <li>
                        <div class="link"><h2><span class="usericon mdi mdi-credit-card-settings"></span> <?php echo e(trans('main.financial')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                        <ul class="submenu">
                            <div class="h-10"></div>
                            <?php if(isset($userMeta['seller_apply']) and $userMeta['seller_apply'] == 1): ?>
                                <div class="alert alert-success">
                                    <p><?php echo e(trans('main.financial_approved')); ?></p>
                                </div>
                            <?php endif; ?>
                            <form method="post" class="form-horizontal" action="/user/profile/meta/store">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="seller_apply" value="1">
                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.bank_name')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <input type="text" name="bank_name" value="<?php echo e(!empty($meta['bank_name']) ? $meta['bank_name'] : ''); ?>" class="form-control" <?php if(isset($userMeta['seller_apply']) and $userMeta['seller_apply'] == 1): ?> disabled <?php endif; ?>>
                                    </div>
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.account_number')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <input type="text" placeholder="Number Only" name="bank_account" value="<?php echo e(!empty($meta['bank_account']) ? $meta['bank_account'] : ''); ?>" class="form-control text-center" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" <?php if(isset($userMeta['seller_apply']) and $userMeta['seller_apply']==1): ?> disabled <?php endif; ?>>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.creditcard')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <input type="text" name="bank_card" class="form-control text-center" dir="ltr" value="<?php echo e(!empty($meta['bank_card']) ? $meta['bank_card'] : ''); ?>" <?php if(isset($userMeta['seller_apply']) and $userMeta['seller_apply']==1): ?> disabled <?php endif; ?>>
                                    </div>
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.identity_scan')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <div class="input-group" style="display: flex">
                                            <button id="lfm_melli_card" data-input="melli_card" data-preview="holder" class="btn btn-primary">
                                                Choose
                                            </button>
                                            <input id="melli_card" class="form-control" dir="ltr" type="text" name="melli_card" value="<?php echo e(!empty($meta['melli_card']) ? $meta['melli_card'] : ''); ?>">
                                            <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="melli_card">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.passport_id')); ?></label>
                                    <div class="col-md-5 tab-con">
                                        <input type="text" name="melli_code" class="form-control text-center" dir="ltr" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo e(!empty($meta['melli_code']) ? $meta['melli_code'] : ''); ?>" <?php if(isset($userMeta['seller_apply']) and $userMeta['seller_apply']==1): ?> disabled <?php endif; ?>>
                                    </div>
                                    <?php if(!isset($userMeta['seller_apply']) || $userMeta['seller_apply']!=1): ?>
                                        <div class="col-md-6">
                                            <input type="submit" class="btn btn-orange pull-left" value="Save">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </form>
                            <div class="h-10"></div>
                        </ul>
                    </li>
                    <li>
                        <div class="link"><h2><span class="usericon mdi mdi-folder-multiple-image"></span> <?php echo e(trans('main.images')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                        <div class="submenu">
                            <div class="h-10"></div>
                            <form method="post" class="form-horizontal" action="/user/profile/meta/store" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.avatar')); ?></label>
                                    <div class="col-md-4 tab-con">
                                        <div class="input-group" style="display: flex">
                                            <button id="lfm_avatar" data-input="avatar" data-preview="holder" class="btn btn-primary">
                                                Choose
                                            </button>
                                            <input id="avatar" class="form-control" dir="ltr" type="text" name="avatar" value="<?php echo e(!empty($meta['avatar']) ? $meta['avatar'] : ''); ?>">
                                            <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="avatar">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.profile_cover')); ?></label>
                                    <div class="col-md-4 tab-con">
                                        <div class="input-group" style="display: flex">
                                            <button id="lfm_profile_image" data-input="profile_image" data-preview="holder" class="btn btn-primary">
                                                Choose
                                            </button>
                                            <input id="profile_image" class="form-control" dir="ltr" type="text" name="profile_image" value="<?php echo e(!empty($meta['profile_image']) ? $meta['profile_image'] : ''); ?>">
                                            <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="profile_image">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" value="Save" class="btn btn-orange pull-left">
                                    </div>
                                </div>
                            </form>


                            <div class="h-10"></div>
                        </div>
                    </li>
                    <li>
                        <div class="link"><h2><span class="usericon mdi mdi-lock-alert"></span> <?php echo e(trans('main.security')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                        <ul class="submenu">
                            <div class="h-10"></div>
                            <form method="post" class="form-horizontal" action="/user/security/change">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.new_password')); ?></label>
                                    <div class="col-md-4 tab-con">
                                        <input type="password" name="password" class="form-control text-center">
                                    </div>
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.retype_password')); ?></label>
                                    <div class="col-md-4 tab-con">
                                        <input type="password" name="repassword" class="form-control text-center">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" value="Change" class="btn btn-orange pull-left">
                                    </div>
                                </div>
                            </form>
                            <div class="h-10"></div>
                        </ul>
                    </li>
                    <li>
                        <div class="link"><h2><span class="usericon mdi mdi-map-marker"></span> <?php echo e(trans('main.postal')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                        <ul class="submenu">
                            <div class="h-10"></div>
                            <form method="post" class="form-horizontal" action="/user/profile/meta/store">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.province')); ?></label>
                                    <div class="col-md-3 tab-con">
                                        <input type="text" class="form-control" name="state" value="<?php echo !empty($meta['state']) ? $meta['state'] : ''; ?>">
                                    </div>
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.city')); ?></label>
                                    <div class="col-md-3 tab-con">
                                        <input type="text" name="city" value="<?php echo e(!empty($meta['city']) ? $meta['city'] : ''); ?>" class="form-control">
                                    </div>
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.zip_code')); ?></label>
                                    <div class="col-md-3 tab-con">
                                        <input type="text" name="postalcode" value="<?php echo e(!empty($meta['postalcode']) ? $meta['postalcode'] : ''); ?>" class="form-control text-center">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-1 tab-con"><?php echo e(trans('main.address')); ?></label>
                                    <div class="col-md-7 tab-con">
                                        <textarea name="address" rows="4" class="form-control"><?php echo e(!empty($meta['address']) ? $meta['address'] : ''); ?></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" class="btn btn-custom pull-left" value="Save">
                                    </div>
                                </div>
                            </form>
                            <div class="h-10"></div>
                        </ul>
                    </li>
                    <?php if($user['vendor'] == 1): ?>
                        <li>
                            <div class="link"><h2><span class="usericon mdi mdi-video"></span> <?php echo e(trans('main.meeting')); ?> </h2><i class="mdi mdi-chevron-down"></i></div>
                            <ul class="submenu">
                                <div class="h-10"></div>
                                <form method="post" class="form-horizontal" action="/user/profile/meta/store">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>zoom jwt</label>
                                            <textarea class="form-control" rows="10" name="zoom_jwt"><?php echo e(!empty($meta['zoom_jwt']) ? $meta['zoom_jwt'] : ''); ?></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-custom" value="Save">
                                    <div class="h-10"></div>
                                </form>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="h-10"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm_avatar,#lfm_profile_image,#lfm_melli_card').filemanager('file', {prefix: '/user/laravel-filemanager'});
    </script>
    <script>$('#profile-hover').addClass('item-box-active');</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate() . '.user.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/user/pages/profile.blade.php ENDPATH**/ ?>
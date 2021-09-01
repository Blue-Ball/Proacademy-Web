<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.general_settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#main" data-toggle="tab"> <?php echo e(trans('admin.general')); ?> </a></li>
                <li class="nav-item"><a class="nav-link" href="#withdraw" data-toggle="tab"> <?php echo e(trans('admin.financial')); ?> </a></li>
                <li class="nav-item"><a class="nav-link" href="#factor" data-toggle="tab"> <?php echo e(trans('admin.invoice')); ?> </a></li>
                <li class="nav-item"><a class="nav-link" href="#gateway" data-toggle="tab"> <?php echo e(trans('admin.payment')); ?> </a></li>
                <li class="nav-item"><a class="nav-link" href="#popup" data-toggle="tab"> <?php echo e(trans('admin.popup')); ?> </a></li>
                <li class="nav-item"><a class="nav-link" href="#videoAds" data-toggle="tab"> <?php echo e(trans('admin.video_ads')); ?> </a></li>
                <li class="nav-item"><a class="nav-link" href="#mainSlide" data-toggle="tab"> <?php echo e(trans('admin.home_hero')); ?> </a></li>
            </ul>
            <div class="tab-content">
                <div id="main" class="tab-pane active">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.site_name')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="site_title" value="<?php echo e($_setting['site_title'] ?? ''); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.site_description')); ?></label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="site_description"><?php echo e($_setting['site_description'] ?? ''); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.site_email')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="site_email" value="<?php echo e($_setting['site_email'] ?? ''); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.meta_description')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="site_meta_description" value="<?php echo e($_setting['site_meta_description'] ?? ''); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.meta_keyword')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="meta_keyword" value="<?php echo e($_setting['meta_keyword'] ?? ''); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo trans('admin.site_language'); ?></label>
                            <div class="col-md-6">
                                <select name="site_language" class="form-control">
                                    <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code=>$title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo $code; ?>" <?php if(isset($_setting['site_language']) and $_setting['site_language'] == $code): ?> selected <?php endif; ?>><?php echo $title; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo trans('admin.user_language_select'); ?></label>
                            <div class="col-md-6">
                                <select name="site_language_select[]" multiple class="form-control selectric" style="height: 200px;">
                                    <?php $__currentLoopData = languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code=>$title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo $code; ?>" <?php if(isset($_setting['site_language_select']) && is_array(json_decode($_setting['site_language_select'],true)) && in_array($code,json_decode($_setting['site_language_select'],true))): ?> selected <?php endif; ?>><?php echo $title; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.fav_icon')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group" style="display: flex">
                                    <button type="button" id="lfm_site_fav" data-input="site_fav" data-preview="holder" class="btn btn-primary">
                                        Choose
                                    </button>
                                    <input id="site_fav" class="form-control" dir="ltr" type="text" name="site_fav" value="<?php echo e($_setting['site_fav'] ?? ''); ?>" placeholder="Displays on browser (48*48px)">
                                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="site_logo">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.logo')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group" style="display: flex">
                                    <button type="button" id="lfm_site_logo" data-input="site_logo" data-preview="holder" class="btn btn-primary">
                                        Choose
                                    </button>
                                    <input id="site_logo" class="form-control" dir="ltr" type="text" name="site_logo" value="<?php echo e($_setting['site_logo'] ?? ''); ?>" placeholder="Displays on header (55*55px)">
                                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="site_logo">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.logotype')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group" style="display: flex">
                                    <button type="button" id="lfm_site_logo_type" data-input="site_logo_type" data-preview="holder" class="btn btn-primary">
                                        Choose
                                    </button>
                                    <input id="site_logo_type" class="form-control" dir="ltr" type="text" name="site_logo_type" dir="ltr" value="<?php echo e($_setting['site_logo_type'] ?? ''); ?>" placeholder="Displays on header ,Hides when scrolling. (200*55px)">
                                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="site_logo_type">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.videos_watermark')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group" style="display: flex">
                                    <button type="button" id="lfm_video_watermark" data-input="video_watermark" data-preview="holder" class="btn btn-primary">
                                        Choose
                                    </button>
                                    <input id="video_watermark" class="form-control" dir="ltr" type="text" name="video_watermark" value="<?php echo e($_setting['video_watermark'] ?? ''); ?>">
                                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="video_watermark">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.requests_icon')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group" style="display: flex">
                                    <button type="button" id="lfm_request_page_icon" data-input="request_page_icon" data-preview="holder" class="btn btn-primary">
                                        Choose
                                    </button>
                                    <input id="request_page_icon" class="form-control" dir="ltr" type="text" name="request_page_icon" value="<?php echo e($_setting['request_page_icon'] ?? ''); ?>" placeholder="Displays on requests page header (80*80px)">
                                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="request_page_icon">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.upload_bg')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group" style="display: flex">
                                    <button type="button" id="lfm_upload_page_background" data-input="upload_page_background" data-preview="holder" class="btn btn-primary">
                                        Choose
                                    </button>
                                    <input id="upload_page_background" class="form-control" dir="ltr" type="text" name="upload_page_background" value="<?php echo e($_setting['upload_page_background'] ?? ''); ?>" placeholder="Displays as upload page bacground (1920*1080px)">
                                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="upload_page_background">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.login_bg')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group" style="display: flex">
                                    <button type="button" id="lfm_login_page_background" data-input="login_page_background" data-preview="holder" class="btn btn-primary">
                                        Choose
                                    </button>
                                    <input id="login_page_background" class="form-control" dir="ltr" type="text" name="login_page_background" value="<?php echo e($_setting['login_page_background'] ?? ''); ?>" placeholder="Displays as login page bacground (1920*1080px)">
                                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="login_page_background">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.days_graph')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group w-150">
                                    <input type="number" class="spinner-input form-control" name="chart_day_count" value="<?php echo e($_setting['chart_day_count'] ?? 0); ?>" maxlength="3">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="site_disable" value="0">
                                        <input type="checkbox" name="site_disable" value="1" class="custom-switch-input" <?php if(!empty($_setting['site_disable']) and $_setting['site_disable']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault"><?php echo e(trans('admin.disable_website')); ?></label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="site_rtl" value="0">
                                        <input type="checkbox" name="site_rtl" value="1" class="custom-switch-input" <?php if(!empty($_setting['site_rtl']) and $_setting['site_rtl']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault">RTL Layout</label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="site_preloader" value="0">
                                        <input type="checkbox" name="site_preloader" value="1" class="custom-switch-input" <?php if(!empty($_setting['site_preloader']) and $_setting['site_preloader']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault"><?php echo trans('admin.preloader'); ?></label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="become_vendor" value="0">
                                        <input type="checkbox" name="become_vendor" value="1" class="custom-switch-input" <?php if(!empty($_setting['become_vendor']) and $_setting['become_vendor']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault"><?php echo trans('admin.become_vendor'); ?></label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="duplicate_login" value="0">
                                        <input type="checkbox" name="duplicate_login" value="1" class="custom-switch-input" <?php if(!empty($_setting['duplicate_login']) and $_setting['duplicate_login']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault"><?php echo trans('admin.avoid_double_login'); ?></label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="user_register_captcha" value="0">
                                        <input type="checkbox" name="user_register_captcha" value="1" class="custom-switch-input" <?php if(!empty($_setting['user_register_captcha']) and $_setting['user_register_captcha']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault"><?php echo e(trans('admin.user_register_captcha')); ?></label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div id="factor" class="tab-pane">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.approver')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" placeholder="Displays at the footer of financial balances" dir="ltr" name="factor_seconder" value="<?php echo e($_setting['factor_seconder'] ?? ''); ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.financial_manager_name')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" dir="ltr" name="factor_approver" placeholder="Displays at the footer of financial balances" value="<?php echo e($_setting['factor_approver'] ?? ''); ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.invoice_logo')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group" style="display: flex">
                                    <button type="button" id="lfm_factor_watermark" data-input="factor_watermark" data-preview="holder" class="btn btn-primary">
                                        Choose
                                    </button>
                                    <input id="factor_watermark" class="form-control" dir="ltr" type="text" name="factor_watermark" dir="ltr" value="<?php echo e($_setting['factor_watermark'] ?? ''); ?>" placeholder="Displays on invoce and balance header">
                                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="factor_watermark">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div id="gateway" class="tab-pane">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault">Currency</label>
                            <div class="col-md-8">
                                <select name="currency" class="form-control">
                                    <option value="USD" <?php if(get_option('currency', 'USD') == 'USD'): ?> selected <?php endif; ?>>United States Dollar</option>
                                    <option value="EUR" <?php if(get_option('currency', 'USD') == 'EUR'): ?> selected <?php endif; ?>>Euro Member Countries</option>
                                    <option value="AUD" <?php if(get_option('currency', 'USD') == 'AUD'): ?> selected <?php endif; ?>>Australia Dollar</option>
                                    <option value="AED" <?php if(get_option('currency', 'USD') == 'AED'): ?> selected <?php endif; ?>>United Arab Emirates dirham</option>
                                    <option value="KAD" <?php if(get_option('currency', 'USD') == 'KAD'): ?> selected <?php endif; ?>>KAD</option>
                                    <option value="JPY" <?php if(get_option('currency', 'USD') == 'JPY'): ?> selected <?php endif; ?>>Japan Yen</option>
                                    <option value="CNY" <?php if(get_option('currency', 'USD') == 'CNY'): ?> selected <?php endif; ?>>China Yuan Renminbi</option>
                                    <option value="SAR" <?php if(get_option('currency', 'USD') == 'SAR'): ?> selected <?php endif; ?>>Saudi Arabia Riyal</option>
                                    <option value="KRW" <?php if(get_option('currency', 'USD') == 'KRW'): ?> selected <?php endif; ?>>Korea (South) Won</option>
                                    <option value="INR" <?php if(get_option('currency', 'USD') == 'INR'): ?> selected <?php endif; ?>>India Rupee</option>
                                    <option value="RUB" <?php if(get_option('currency', 'USD') == 'RUB'): ?> selected <?php endif; ?>>Russia Ruble</option>
                                    --------
                                    <option value="Lek" <?php if(get_option('currency', 'USD') == 'Lek'): ?> selected <?php endif; ?>>Albania Lek</option>
                                    <option value="AFN" <?php if(get_option('currency', 'USD') == 'AFN'): ?> selected <?php endif; ?>>Afghanistan Afghani</option>
                                    <option value="ARS" <?php if(get_option('currency', 'USD') == 'ARS'): ?> selected <?php endif; ?>>Argentina Peso</option>
                                    <option value="AWG" <?php if(get_option('currency', 'USD') == 'AWG'): ?> selected <?php endif; ?>>Aruba Guilder</option>
                                    <option value="AUD" <?php if(get_option('currency', 'USD') == 'AUD'): ?> selected <?php endif; ?>>Australia Dollar</option>
                                    <option value="AZN" <?php if(get_option('currency', 'USD') == 'AZN'): ?> selected <?php endif; ?>>Azerbaijan Manat</option>
                                    <option value="BSD" <?php if(get_option('currency', 'USD') == 'BSD'): ?> selected <?php endif; ?>>Bahamas Dollar</option>
                                    <option value="BBD" <?php if(get_option('currency', 'USD') == 'BBD'): ?> selected <?php endif; ?>>Barbados Dollar</option>
                                    <option value="BYN" <?php if(get_option('currency', 'USD') == 'BYN'): ?> selected <?php endif; ?>>Belarus Ruble</option>
                                    <option value="BZD" <?php if(get_option('currency', 'USD') == 'BZD'): ?> selected <?php endif; ?>>Belize Dollar</option>
                                    <option value="BMD" <?php if(get_option('currency', 'USD') == 'BMD'): ?> selected <?php endif; ?>>Bermuda Dollar</option>
                                    <option value="BOB" <?php if(get_option('currency', 'USD') == 'BOB'): ?> selected <?php endif; ?>>Bolivia Bolíviano</option>
                                    <option value="BAM" <?php if(get_option('currency', 'USD') == 'BAM'): ?> selected <?php endif; ?>>Bosnia and Herzegovina Convertible Mark</option>
                                    <option value="BWP" <?php if(get_option('currency', 'USD') == 'BWP'): ?> selected <?php endif; ?>>Botswana Pula</option>
                                    <option value="BGN" <?php if(get_option('currency', 'USD') == 'BGN'): ?> selected <?php endif; ?>>Bulgaria Lev</option>
                                    <option value="BRL" <?php if(get_option('currency', 'USD') == 'BRL'): ?> selected <?php endif; ?>>Brazil Real</option>
                                    <option value="BND" <?php if(get_option('currency', 'USD') == 'BND'): ?> selected <?php endif; ?>>Brunei Darussalam Dollar</option>
                                    <option value="KHR" <?php if(get_option('currency', 'USD') == 'KHR'): ?> selected <?php endif; ?>>Cambodia Riel</option>
                                    <option value="CAD" <?php if(get_option('currency', 'USD') == 'CAD'): ?> selected <?php endif; ?>>Canada Dollar</option>
                                    <option value="KYD" <?php if(get_option('currency', 'USD') == 'KYD'): ?> selected <?php endif; ?>>Cayman Islands Dollar</option>
                                    <option value="CLP" <?php if(get_option('currency', 'USD') == 'CLP'): ?> selected <?php endif; ?>>Chile Peso</option>
                                    <option value="COP" <?php if(get_option('currency', 'USD') == 'COP'): ?> selected <?php endif; ?>>Colombia Peso</option>
                                    <option value="CRC" <?php if(get_option('currency', 'USD') == 'CRC'): ?> selected <?php endif; ?>>Costa Rica Colon</option>
                                    <option value="HRK" <?php if(get_option('currency', 'USD') == 'HRK'): ?> selected <?php endif; ?>>Croatia Kuna</option>
                                    <option value="CUP" <?php if(get_option('currency', 'USD') == 'CUP'): ?> selected <?php endif; ?>>Cuba Peso</option>
                                    <option value="CZK" <?php if(get_option('currency', 'USD') == 'CZK'): ?> selected <?php endif; ?>>Czech Republic Koruna</option>
                                    <option value="DKK" <?php if(get_option('currency', 'USD') == 'DKK'): ?> selected <?php endif; ?>>Denmark Krone</option>
                                    <option value="DOP" <?php if(get_option('currency', 'USD') == 'DOP'): ?> selected <?php endif; ?>>Dominican Republic Peso</option>
                                    <option value="XCD" <?php if(get_option('currency', 'USD') == 'XCD'): ?> selected <?php endif; ?>>East Caribbean Dollar</option>
                                    <option value="EGP" <?php if(get_option('currency', 'USD') == 'EGP'): ?> selected <?php endif; ?>>Egypt Pound</option>
                                    <option value="GTQ" <?php if(get_option('currency', 'USD') == 'GTQ'): ?> selected <?php endif; ?>>Guatemala Quetzal</option>
                                    <option value="HKD" <?php if(get_option('currency', 'USD') == 'HKD'): ?> selected <?php endif; ?>>Hong Kong Dollar</option>
                                    <option value="HUF" <?php if(get_option('currency', 'USD') == 'HUF'): ?> selected <?php endif; ?>>Hungary Forint</option>
                                    <option value="IDR" <?php if(get_option('currency', 'USD') == 'IDR'): ?> selected <?php endif; ?>>Indonesia Rupiah</option>
                                    <option value="IRR" <?php if(get_option('currency', 'USD') == 'IRR'): ?> selected <?php endif; ?>>Iran Rial</option>
                                    <option value="ILS" <?php if(get_option('currency', 'USD') == 'ILS'): ?> selected <?php endif; ?>>Israel Shekel</option>
                                    <option value="LBP" <?php if(get_option('currency', 'USD') == 'LBP'): ?> selected <?php endif; ?>>Lebanon Pound</option>
                                    <option value="MYR" <?php if(get_option('currency', 'USD') == 'MYR'): ?> selected <?php endif; ?>>Malaysia Ringgit</option>
                                    <option value="NGN" <?php if(get_option('currency', 'USD') == 'NGN'): ?> selected <?php endif; ?>>Nigeria Naira</option>
                                    <option value="NOK" <?php if(get_option('currency', 'USD') == 'NOK'): ?> selected <?php endif; ?>>Norway Krone</option>
                                    <option value="OMR" <?php if(get_option('currency', 'USD') == 'OMR'): ?> selected <?php endif; ?>>Oman Rial</option>
                                    <option value="PKR" <?php if(get_option('currency', 'USD') == 'PKR'): ?> selected <?php endif; ?>>Pakistan Rupee</option>
                                    <option value="PHP" <?php if(get_option('currency', 'USD') == 'PHP'): ?> selected <?php endif; ?>>Philippines Peso</option>
                                    <option value="PLN" <?php if(get_option('currency', 'USD') == 'PLN'): ?> selected <?php endif; ?>>Poland Zloty</option>
                                    <option value="RON" <?php if(get_option('currency', 'USD') == 'RON'): ?> selected <?php endif; ?>>Romania Leu</option>
                                    <option value="ZAR" <?php if(get_option('currency', 'USD') == 'ZAR'): ?> selected <?php endif; ?>>South Africa Rand</option>
                                    <option value="LKR" <?php if(get_option('currency', 'USD') == 'LKR'): ?> selected <?php endif; ?>>Sri Lanka Rupee</option>
                                    <option value="SEK" <?php if(get_option('currency', 'USD') == 'SEK'): ?> selected <?php endif; ?>>Sweden Krona</option>
                                    <option value="CHF" <?php if(get_option('currency', 'USD') == 'CHF'): ?> selected <?php endif; ?>>Switzerland Franc</option>
                                    <option value="THB" <?php if(get_option('currency', 'USD') == 'THB'): ?> selected <?php endif; ?>>Thailand Baht</option>
                                    <option value="TRY" <?php if(get_option('currency', 'USD') == 'TRY'): ?> selected <?php endif; ?>>Turkey Lira</option>
                                    <option value="UAH" <?php if(get_option('currency', 'USD') == 'UAH'): ?> selected <?php endif; ?>>Ukraine Hryvnia</option>
                                    <option value="GBP" <?php if(get_option('currency', 'USD') == 'GBP'): ?> selected <?php endif; ?>>United Kingdom Pound</option>
                                    <option value="TWD" <?php if(get_option('currency', 'USD') == 'TWD'): ?> selected <?php endif; ?>>Taiwan New Dollar</option>
                                    <option value="VND" <?php if(get_option('currency', 'USD') == 'VND'): ?> selected <?php endif; ?>>Viet Nam Dong</option>
                                    <option value="UZS" <?php if(get_option('currency', 'USD') == 'UZS'): ?> selected <?php endif; ?>>Uzbekistan Som</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="gateway_paypal" value="0">
                                        <input type="checkbox" name="gateway_paypal" value="1" class="custom-switch-input" <?php if(!empty($_setting['gateway_paypal']) and $_setting['gateway_paypal']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault">Paypal</label>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="gateway_paystack" value="0">
                                        <input type="checkbox" name="gateway_paystack" value="1" class="custom-switch-input" <?php if(!empty($_setting['gateway_paystack']) and $_setting['gateway_paystack']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault">Paystack</label>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="gateway_paytm" value="0">
                                        <input type="checkbox" name="gateway_paytm" value="1" class="custom-switch-input" <?php if(!empty($_setting['gateway_paytm']) and $_setting['gateway_paytm']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault">Paytm</label>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="gateway_payu" value="0">
                                        <input type="checkbox" name="gateway_payu" value="1" class="custom-switch-input" <?php if(!empty($_setting['gateway_payu']) and $_setting['gateway_payu']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault">Payu</label>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="gateway_razorpay" value="0">
                                        <input type="checkbox" name="gateway_razorpay" value="1" class="custom-switch-input" <?php if(!empty($_setting['gateway_razorpay']) and $_setting['gateway_razorpay']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault">Razorpay</label>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="gateway_cinetpay" value="0">
                                        <input type="checkbox" name="gateway_cinetpay" value="1" class="custom-switch-input" <?php if(!empty($_setting['gateway_cinetpay']) and $_setting['gateway_cinetpay']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault">Cinetpay</label>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="gateway_stripe" value="0">
                                        <input type="checkbox" name="gateway_stripe" value="1" class="custom-switch-input" <?php if(!empty($_setting['gateway_stripe']) and $_setting['gateway_stripe']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault">Stripe</label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="withdraw" class="tab-pane">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.open_courses_comm')); ?></label>
                            <div class="col-md-3">
                                <input type="number" class="spinner-input form-control" name="site_income" value="<?php echo e($_setting['site_income'] ?? 0); ?>" maxlength="3">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.exclusive_courses_comm')); ?></label>
                            <div class="col-md-3">
                                <input type="number" class="spinner-input form-control" name="site_income_private" value="<?php echo e($_setting['site_income_private'] ?? 0); ?>" maxlength="3">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.min_withdrawal_amount')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="site_withdraw_price" value="<?php echo get_option('site_withdraw_price',0); ?>" class="form-control text-center numtostr">
                                    <span class="input-group-append click-for-upload cu-p">
                              <span class="input-group-text"><?php echo currencySign(); ?></span>
                           </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div id="popup" class="tab-pane">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="site_popup" value="0">
                                        <input type="checkbox" name="site_popup" value="1" class="custom-switch-input" <?php if(!empty($_setting['site_popup']) and $_setting['site_popup']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault"><?php echo e(trans('admin.popup')); ?></label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.popup_image')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group" style="display: flex">
                                    <button type="button" id="lfm_popup_image" data-input="popup_image" data-preview="holder" class="btn btn-primary">
                                        Choose
                                    </button>
                                    <input id="popup_image" class="form-control" dir="ltr" type="text" name="popup_image" dir="ltr" value="<?php echo e($_setting['popup_image'] ?? ''); ?>" >
                                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="popup_image">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.popup_link')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" dir="ltr" name="popup_url" value="<?php echo e($_setting['popup_url'] ?? ''); ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div id="videoAds" class="tab-pane">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="custom-switches-stacked">
                                    <label class="custom-switch">
                                        <input type="hidden" name="site_videoads" value="0">
                                        <input type="checkbox" name="site_videoads" value="1" class="custom-switch-input" <?php if(!empty($_setting['site_videoads']) and $_setting['site_videoads']==1): ?> checked <?php endif; ?> />
                                        <span class="custom-switch-indicator"></span>
                                        <label class="custom-switch-description" for="inputDefault"><?php echo e(trans('admin.enable')); ?></label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Xml <?php echo e(trans('admin.video_file')); ?> Url</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" placeholder="https://" name="site_videoads_source" dir="ltr" value="<?php echo e($_setting['site_videoads_source'] ?? ''); ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo trans('admin.text'); ?></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="site_videoads_title" dir="ltr" value="<?php echo e($_setting['site_videoads_title'] ?? ''); ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault">Roll Type</label>
                            <div class="col-md-6">
                                <select name="site_videoads_roll_type" class="form-control">
                                    <option value="preRoll" <?php if(get_option('site_videoads_roll_type','') == 'preRoll'): ?> selected <?php endif; ?>>PreRoll</option>
                                    <option value="midRoll" <?php if(get_option('site_videoads_roll_type','') == 'midRoll'): ?> selected <?php endif; ?>>MidRoll</option>
                                    <option value="postRoll" <?php if(get_option('site_videoads_roll_type','') == 'postRoll'): ?> selected <?php endif; ?>>PostRoll</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.minimum_time_to_skip')); ?></label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="number" class="spinner-input form-control text-center" name="site_videoads_time" value="<?php echo e($_setting['site_videoads_time'] ?? 0); ?>" maxlength="3">
                                    <span class="input-group-append"><label class="input-group-text">Seconds</label></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div id="mainSlide" class="tab-pane">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo e(trans('admin.hero_bg')); ?></label>
                            <div class="col-md-6">
                                <div class="input-group" style="display: flex">
                                    <button type="button" id="lfm_main_page_slide" data-input="main_page_slide" data-preview="holder" class="btn btn-primary">
                                        Choose
                                    </button>
                                    <input id="main_page_slide" class="form-control" dir="ltr" type="text" name="main_page_slide" dir="ltr" value="<?php echo e($_setting['main_page_slide'] ?? ''); ?>" placeholder="Displays as homepage header background (1920*500px)">
                                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="main_page_slide">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" name="main_page_slide_title" value="<?php echo e($_setting['main_page_slide_title'] ?? ''); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.description')); ?></label>
                            <div class="col-md-6">
                                <textarea rows="5" class="form-control text-center" name="main_page_slide_text"><?php echo e($_setting['main_page_slide_text'] ?? ''); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.first_button')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" name="main_page_slide_btn_1_text" value="<?php echo e($_setting['main_page_slide_btn_1_text'] ?? ''); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.second_button')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" name="main_page_slide_btn_2_text" value="<?php echo e($_setting['main_page_slide_btn_2_text'] ?? ''); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.first_button_link')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" name="main_page_slide_btn_1_url" value="<?php echo e($_setting['main_page_slide_btn_1_url'] ?? ''); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="inputDefault"><?php echo e(trans('admin.secound_button_link')); ?></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-center" name="main_page_slide_btn_2_url" value="<?php echo e($_setting['main_page_slide_btn_2_url'] ?? ''); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm_site_fav,#lfm_site_logo,#lfm_site_logo_type,#lfm_video_watermark,#lfm_request_page_icon,#lfm_upload_page_background,#lfm_login_page_background,#lfm_factor_watermark,#lfm_popup_image,#lfm_main_page_slide').filemanager('image');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Settings','General']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/admin/setting/main.blade.php ENDPATH**/ ?>
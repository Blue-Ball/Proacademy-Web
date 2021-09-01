<div class="container-fluid">
    <div class="container news-container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-6 news-section">
                <div class="row contents_box">
                    <div class="header">
						<i class="secicon mdi mdi-script-text"></i>
                        <span><?php echo e(trans('main.latest_articles')); ?></span>
                    </div>
                    <div class="body">
                        <ul>
                            <?php $__currentLoopData = $article_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="/article/item/<?php echo e($article->id); ?>/<?php echo \Illuminate\Support\Str::slug($article->title) ?? ''; ?>">
                                        <img src="<?php echo e($article->image); ?>" alt="<?php echo e($article->title ?? ''); ?>"><span><?php echo e($article->title); ?></span><label for=""><?php echo e(date('l d F Y',$article->created_at)); ?></label>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="more-link">
						<i class="secicon mdi mdi-dots-horizontal"></i>
                        <a href="/article/list"><?php echo e(trans('main.more')); ?></a>
                    </div>
                </div>
                <div class="h-10"></div>
                <div class="row contents_box">
                    <div class="header header-news">
						<i class="secicon mdi mdi-clipboard-text"></i>
                        <span><?php echo e(trans('main.latest_news')); ?></span>
                    </div>
                    <div class="body">
                        <ul>
                            <?php $__currentLoopData = $blog_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="/blog/post/<?php echo e($post->id); ?>/<?php echo \Illuminate\Support\Str::slug($post->title) ?? ''; ?>"><img src="<?php echo e($post->image); ?>" alt=""><span><?php echo e($post->title); ?></span><label for=""><?php echo e(date('l d F Y',$post->created_at)); ?></label></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="more-link">
						<i class="secicon mdi mdi-dots-horizontal"></i>
                        <a href="/blog"><?php echo e(trans('main.more')); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-6">
                <div class="row-xs">
                    <div class="two-ads-container">
                        <div class="h-10 visible-xs"></div>
                        <?php if(isset($ads)): ?>
                            <div class="row">
                                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($ad->position == 'main-article-side'): ?>
                                        <a href="<?php echo e($ad->url); ?>"><img src="<?php echo e($ad->image); ?>" class="<?php echo e($ad->size); ?>"></a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="h-15"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row-xs contents_box">
                    <div class="top-user-container">
                        <div class="header">
							<i class="secicon mdi mdi-teach"></i>
                            <span class="best-users"><?php echo e(trans('main.top_vendors')); ?></span>
                        </div>
                        <div class="user-tabs">
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li class="active"><a href="#tab1" role="tab" data-toggle="tab"><?php echo e(trans('main.courses_feedback')); ?></a></li>
                                <li><a href="#tab2" role="tab" data-toggle="tab"><?php echo e(trans('main.courses_count')); ?></a></li>
                                <li><a href="#tab3" role="tab" data-toggle="tab"><?php echo e(trans('main.sales')); ?></a></li>
                            </ul>
                            <!-- TAB CONTENT -->
                            <div class="tab-content">
                                <div class="active tab-pane fade in" id="tab1">
                                    <?php if(isset($user_rate)): ?>
                                        <?php $__currentLoopData = $user_rate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $meta = arrayToList($ur->usermetas,'option','value'); ?>
                                            <div class="col-md-3 tab-con">
                                        <a href="/profile/<?php echo e($ur->id); ?>">
                                            <img alt="<?php echo e($ur->username ?? ''); ?>" src="<?php echo e(!empty($meta['avatar']) ? $meta['avatar'] : '/assets/default/images/user.png'); ?>">
                                            <span><?php echo e(!empty($ur->name) ? $ur->name : ''); ?></span>
                                        </a>
                                    </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="tab2">
                                    <?php if(isset($user_content)): ?>
                                        <?php $__currentLoopData = $user_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $meta = arrayToList($uc->usermetas,'option','value'); ?>
                                            <div class="col-md-3 tab-con">
                                                <a href="/profile/<?php echo e($uc->id); ?>">
                                                    <img  alt="<?php echo e($uc->username ?? ''); ?>"  src="<?php echo e(!empty($meta['avatar']) ? $meta['avatar'] : '/assets/default/images/user.png'); ?>">
                                                    <span><?php echo e(!empty($ur->name) ? $ur->name : ''); ?></span>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="tab3">
                                    <?php if(isset($user_popular)): ?>
                                        <?php $__currentLoopData = $user_popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $up): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $meta = arrayToList($up->usermetas,'option','value'); ?>
                                            <div class="col-md-3 tab-con">
                                                <a href="/profile/<?php echo e($up->id); ?>">
                                                    <img alt="<?php echo e($up->username ?? ''); ?>" src="<?php echo e(!empty($meta['avatar']) ? $meta['avatar'] : '/assets/default/images/user.png'); ?>">
                                                    <span><?php echo e(!empty($ur->name) ? $ur->name : ''); ?></span>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-10"></div>
                <div class="row-xs contents_box">
                    <div class="top-user-container">
                        <div class="header">
							<i class="secicon mdi mdi-bullhorn"></i>
                            <span class="best-chanels"><?php echo e(trans('main.top_channels')); ?></span>
                        </div>
                        <div class="user-tabs">
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li class="active"><a href="#tab4" role="tab" data-toggle="tab"><?php echo e(trans('main.newest')); ?></a></li>
                                <li><a href="#tab5" role="tab" data-toggle="tab"><?php echo e(trans('main.most_viewed')); ?></a></li>
                                <li><a href="#tab6" role="tab" data-toggle="tab"><?php echo e(trans('main.best_rated')); ?></a></li>
                            </ul>
                            <!-- TAB CONTENT -->
                            <div class="tab-content">
                                <div class="active tab-pane fade in" id="tab4">
                                    <?php if(isset($channels)): ?>
                                        <?php $__currentLoopData = $channels['new']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3 tab-con">
                                                <a href="/chanel/<?php echo e($ur->username); ?>">
                                                    <img alt="<?php echo e($ur->title ?? ''); ?>" src="<?php echo e(!empty($ur->avatar) ? $ur->avatar : '/assets/default/images/user.png'); ?>">
                                                    <span><?php echo e(!empty($ur->title) ? $ur->title : ''); ?></span>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="tab5">
                                    <?php if(isset($channels)): ?>
                                        <?php $__currentLoopData = $channels['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3 tab-con">
                                                <a href="/chanel/<?php echo e($ur->username); ?>">
                                                    <img alt="<?php echo e($ur->title ?? ''); ?>" src="<?php echo e(!empty($ur->avatar) ? $ur->avatar : '/assets/default/images/user.png'); ?>">
                                                    <span><?php echo e(!empty($ur->title) ? $ur->title : ''); ?></span>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="tab6">
                                    <?php if(isset($channels)): ?>
                                        <?php $__currentLoopData = $channels['popular']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3 tab-con">
                                                <a href="/chanel/<?php echo e($ur->username); ?>">
                                                    <img alt="<?php echo e($ur->title ?? ''); ?>" src="<?php echo e(!empty($ur->avatar) ? $ur->avatar : '/assets/default/images/user.png'); ?>">
                                                    <span><?php echo e(!empty($ur->title) ? $ur->title : ''); ?></span>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/view/parts/news.blade.php ENDPATH**/ ?>
<?php $__env->startSection($user['vendor'] == 1?'tab2':'tab1','active'); ?>
<?php $__env->startSection('tab'); ?>
    <div class="h-20"></div>
    <?php if(count($list) == 0): ?>
        <div class="text-center">
            <img src="/assets/default/images/empty/dashboardbought.png">
            <div class="h-20"></div>
            <span class="empty-first-line"><?php echo e(trans('main.not_purchased_item')); ?></span>
            <div class="h-20"></div>
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table ucp-table" id="buy-table">
                <thead class="thead-s">
                <th class="text-center" width="80"><?php echo e(trans('main.item_no')); ?></th>
                <th class="cell-ta"><?php echo e(trans('main.title')); ?></th>
                <th class="cell-ta"><?php echo e(trans('main.category')); ?></th>
                <th class="cell-ta"><?php echo e(trans('main.vendor')); ?></th>
                <th class="text-center"><?php echo e(trans('main.delivery_type')); ?></th>
                <th class="text-center" width="100"><?php echo e(trans('main.price')); ?></th>
                <th class="text-center" width="150"><?php echo e(trans('main.pur_date')); ?></th>
                <th class="text-center" width="100"><?php echo e(trans('main.controls')); ?></th>
                </thead>
                <tbody>
                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($item->content)): ?>
                        <tr class="text-center">
                            <td class="text-center"><?php echo e($item->id); ?></td>
                            <td class="cell-ta"><a href="/product/<?php echo e($item->content->id ?? ''); ?>"><?php echo e($item->content->title ?? ''); ?></a></td>
                            <td class="cell-ta"><a href="/category/<?php echo e($item->content->category->class ?? ''); ?>"><?php echo e($item->content->category->title ?? ''); ?></a></td>
                            <td class="cell-ta"><a href="/profile/<?php echo e($item->content->user->id ?? ''); ?>"><?php echo e($item->content->user->name ?? $item->content->user->username ?? ''); ?></a></td>
                            <td>
                                <?php if($item->type == "download"): ?>
                                    <span class="green-s"><?php echo e(trans('main.download')); ?></span>
                                <?php elseif($item->type == 'subscribe'): ?>
                                    <span class="blue-s"><?php echo e(trans('main.subscribe')); ?></span>
                                <?php else: ?>
                                    <span class="blue-s"><?php echo e(trans('main.postal')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(currencySign()); ?><?php echo e($item->transaction->price); ?></td>
                            <td>
                                <?php echo e(date('Y/m/d',$item->created_at)); ?>

                                <?php if($item->type == 'subscribe'): ?>
                                    <br><span style="color: red;"><?php echo e(date('Y/m/d',$item->remain_time)); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($item->type == 'subscribe'): ?>

                                <?php endif; ?>
                                <?php if($item->type == 'post'): ?>
                                    <a class="gray-s" href="#" data-toggle="modal" data-target="#post<?php echo e($item->id); ?>" title="Shipping Detail"><span class="crticon mdi mdi-package"></span></a>
                                <?php endif; ?>
                                <a class="gray-s" href="/product/<?php echo e($item->content->id); ?>" title="Download"><span class="crticon mdi mdi-arrow-down-thick"></span></a>
                                <a class="gray-s" href="/product/<?php echo e($item->content->id); ?>#blog-comment-scroll" title="Leave comment"><span class="crticon mdi mdi-comment-plus"></span></a>
                                <a class="gray-s" target="_blank" href="/user/video/buy/print/<?php echo e($item->id); ?>/" title="View invoice"><span class="crticon mdi mdi-printer"></span></a>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <div class="modal fade" id="post<?php echo e($item->id); ?>">
                        <div class="modal-dialog">
                            <form class="form form-horizontal" method="post" action="/user/video/buy/confirm/<?php echo e($item->id); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><?php echo e(trans('main.shipping_detail')); ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p> <?php echo e(trans('main.tracking_code')); ?> <strong><?php if($item->post_code == null or $item->post_code == ''): ?><?php echo '<b class="red-s">Package not sent yet.</b>'; ?> <?php else: ?> <?php echo e($item->post_code); ?> <?php endif; ?></strong></p>
                                        <br>
                                        <p>  <?php echo e(trans('main.shipping_date')); ?> <strong><?php if(is_numeric($item->post_code_date)): ?> <?php echo e(date('d F Y | H:i',$item->post_code_date)); ?> <?php endif; ?></strong></p>
                                        <br>
                                        <div class="form-group">
                                            <label class="control-label"> <?php echo e(trans('main.description')); ?> </label>
                                            <?php if($item->post_confirm == ''): ?>
                                                <textarea name="post_confirm" rows="4" class="form-control" required></textarea>
                                            <?php else: ?>
                                                <strong class="green-s"> <?php echo e($item->post_confirm); ?> </strong>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($item->post_feedback == null): ?>
                                            <div class="form-group">
                                                <label><input type="radio" name="post_feedback" value="1" class="val-mid">&nbsp;<?php echo e(trans('main.received_nop')); ?></label>
                                                <label class="lab-e"><input name="post_feedback" type="radio" value="2" class="val-mid">&nbsp;<?php echo e(trans('main.received_problem')); ?></label>
                                                <label class="lab-n"><input name="post_feedback" type="radio" value="3" class="val-mid">&nbsp;<?php echo e(trans('main.not_received')); ?></label>
                                            </div>
                                        <?php else: ?>
                                            <?php if($item->post_feedback == 1): ?>
                                                <label><?php echo e(trans('main.received_nop')); ?></label>
                                            <?php endif; ?>
                                            <?php if($item->post_feedback == 2): ?>
                                                <label><?php echo e(trans('main.received_problem')); ?></label>
                                            <?php endif; ?>
                                            <?php if($item->post_feedback == 3): ?>
                                                <label><?php echo e(trans('main.not_received')); ?></label>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <span class="pull-right star-rate-text"><?php echo e(trans('main.feedback')); ?></span>&nbsp;
                                        <span class="pull-right star-rate" data-id="<?php echo e($item->id); ?>" data-score="<?php echo e($item->rate->rate ?? 0); ?>"></span>
                                        <button type="button" class="btn btn-custom" data-dismiss="modal"><?php echo e(trans('main.close')); ?></button>
                                        <?php if($item->post_confirm == ''): ?>
                                            <button type="submit" class="btn btn-custom btn-submit-confirm" title="Please submit feedback before confirmation." disabled><?php echo e(trans('main.confirm')); ?></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('.star-rate').raty({
            starType: 'i',
            score: function () {
                return $(this).attr('data-score');
            },
            click: function (rate) {
                var id = $(this).attr('data-id');
                $.get('/user/video/buy/rate/' + id + '/' + rate, function (data) {
                    if (data == 0) {
                        $.notify({
                            message: 'Sorry feedback not send. Try again.'
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
                        $('.btn-submit-confirm').removeAttr('disabled');
                        $.notify({
                            message: 'Your feedback sent successfully.'
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make($user['vendor'] == 1 ? getTemplate() . '.user.layout.videolayout' : getTemplate() . '.user.layout_user.videolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/user/sell/buy.blade.php ENDPATH**/ ?>
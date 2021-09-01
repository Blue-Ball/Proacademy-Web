<?php $__env->startSection('tab3','active'); ?>
<?php $__env->startSection('tab'); ?>
    <div class="h-20"></div>
    <div class="row">
        <div class="col-md-6 col-xs-12 tab-con">
            <div class="ucp-section-box">
                <div class="header back-red"><?php echo e(trans('main.new_support_ticket')); ?></div>
                <div class="body">
                    <form method="post" action="/user/ticket/store">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label class="control-label" for="inputDefault"><?php echo e(trans('main.title')); ?></label>
                            <input type="text" name="title" class="form-control" id="inputDefault" <?php if(!empty(request()->get('type')) && request()->get('type') == 'become_vendor'): ?> value="<?php echo trans('main.become_vendor_title'); ?>" <?php endif; ?> required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="inputDefault"><?php echo e(trans('main.department')); ?></label>
                            <select name="category_id" class="form-control font-s" required>
                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label control-label-p"><?php echo e(trans('main.attachment')); ?></label>
                            <div class="input-group" style="display: flex">
                                <button id="lfm_attach" data-input="attach" data-preview="holder" class="btn btn-primary">
                                    Choose
                                </button>
                                <input id="attach" class="form-control" dir="ltr" type="text" name="attach" value="<?php echo e(!empty($meta['attach']) ? $meta['attach'] : ''); ?>">
                                <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="attach">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><?php echo e(trans('main.description')); ?></label>
                            <textarea class="form-control" rows="7" name="msg" required></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-custom pull-left" value="Reply"><?php echo e(trans('main.send')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 tab-con">
            <?php if(count($lists) == 0): ?>
                <div class="text-center">
                    <img src="/assets/default/images/empty/tickets.png">
                    <div class="h-20"></div>
                    <span class="empty-first-line"><?php echo e(trans('main.no_sup_ticket')); ?></span>
                    <div class="h-20"></div>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table ucp-table" id="ticket-table">
                        <thead class="back-blue">
                        <tr>
                            <th class="cell-ta"><?php echo e(trans('main.title')); ?></th>
                            <th width="100" class="text-center"><?php echo e(trans('main.status')); ?></th>
                            <th width="100" class="text-center"><?php echo e(trans('main.controls')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="cell-ta"><?php echo e($item->title); ?></td>
                                <td class="text-center">
                                    <?php if($item->mode == 'open'): ?>
                                        <?php if($item->messages->last()['mode'] == 'admin'): ?>
                                            Staff Reply
                                        <?php else: ?>
                                            Waiting
                                        <?php endif; ?>
                                    <?php else: ?>
                                        Closed
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="/user/ticket/reply/<?php echo e($item->id); ?>" title="View/Reply"><span class="crticon mdi mdi-message-text"></span></a>
                                    <?php if($item->mode == 'open'): ?>
                                        <a href="/user/ticket/close/<?php echo e($item->id); ?>" title="Close Ticket"><span class="crticon mdi mdi-close-octagon"></span></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm_attach').filemanager('file', {prefix: '/user/laravel-filemanager'});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($user['vendor'] == 1 ? getTemplate() . '.user.layout.supportlayout' : getTemplate() . '.user.layout_user.supportlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/user/ticket/list.blade.php ENDPATH**/ ?>
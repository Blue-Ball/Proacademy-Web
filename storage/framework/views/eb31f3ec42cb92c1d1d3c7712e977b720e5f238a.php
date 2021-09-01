<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.social_networks')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <div class="card">
        <div class="card-body">
            <div id="day" class="tab-pane active">
                <form method="post" action="/admin/setting/social/store" class="form-horizontal form-bordered">
                    <?php echo e(csrf_field()); ?>


                    <?php if($errors->any()): ?>
                        <ul>
                            <?php echo implode('', $errors->all('<li style="color: red">:message</li>')); ?>

                        </ul>
                    <?php endif; ?>

                    <input type="hidden" name="id" value="<?php echo e($item->id ?? ''); ?>">

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                        <div class="col-md-8">
                            <input type="text" name="title" value="<?php echo e($item->title ?? ''); ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.th_icon')); ?></label>
                        <div class="col-md-8">

                            <div class="input-group" style="display: flex">
                                <button type="button" data-input="icon" data-preview="holder" class="btn btn-primary lfm_image">
                                    Choose
                                </button>
                                <input id="icon" class="form-control" type="text" name="icon" dir="ltr" value="<?php echo e($item->icon ?? ''); ?>">
                                <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="icon">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"><?php echo e(trans('admin.link_address')); ?></label>
                        <div class="col-md-8">
                            <input type="text" name="link" value="<?php echo e($item->link ?? ''); ?>" class="form-control text-left">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.sort')); ?></label>
                        <div class="col-md-2">
                            <input type="number" name="sort" value="<?php echo e($item->sort ?? ''); ?>" class="form-control text-center">
                        </div>
                        <div class="h-20"></div>
                        <div class="col-md-6">
                            <button class="btn btn-primary pull-left" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                        </div>
                    </div>


                </form>
                <table class="table table-bordered table-striped mb-none" id="datatable-basic">
                    <thead>
                    <tr>
                        <th class="text-center" width="60"><?php echo e(trans('admin.th_icon')); ?></th>
                        <th><?php echo e(trans('admin.th_title')); ?></th>
                        <th class="text-center" width="100"><?php echo e(trans('admin.link_address')); ?></th>
                        <th class="text-center" width="150"><?php echo e(trans('admin.th_controls')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><img src="<?php echo e($list->icon); ?>" width="24"/></td>
                            <td><?php echo e($list->title); ?></td>
                            <td class="text-center"><a href="<?php echo e($list->link); ?>" target="_blank"><?php echo e(trans('admin.view')); ?></a></td>
                            <td class="text-center">
                                <a href="/admin/setting/social/edit/<?php echo e($list->id); ?>" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="#" data-href="/admin/setting/social/delete/<?php echo e($list->id); ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Settings','Social Networks']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/admin/setting/social.blade.php ENDPATH**/ ?>
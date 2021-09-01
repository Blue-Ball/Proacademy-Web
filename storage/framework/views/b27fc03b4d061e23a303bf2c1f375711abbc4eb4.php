<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.footer_settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <div class="card">
        <div class="card-body">
            <div class="col-md-12">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#col1" data-toggle="tab"> <?php echo e(trans('admin.first_col')); ?> </a></li>
                    <li class="nav-item"><a class="nav-link" href="#col2" data-toggle="tab"> <?php echo e(trans('admin.second_col')); ?> </a></li>
                    <li class="nav-item"><a class="nav-link" href="#col3" data-toggle="tab"> <?php echo e(trans('admin.third_col')); ?> </a></li>
                    <li class="nav-item"><a class="nav-link" href="#col4" data-toggle="tab"> <?php echo e(trans('admin.forth_col')); ?> </a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div id="col1" class="tab-pane active">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control text-center" dir="ltr" name="footer_col1_title" value="<?php echo e($_setting['footer_col1_title'] ?? ''); ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="summernote" name="footer_col1_content"><?php echo $_setting['footer_col1_content'] ?? ''; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary pull-left" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div id="col2" class="tab-pane">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control text-center" dir="ltr" name="footer_col2_title" value="<?php echo e($_setting['footer_col2_title'] ?? ''); ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="summernote" name="footer_col2_content"><?php echo $_setting['footer_col2_content'] ?? ''; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary pull-left" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div id="col3" class="tab-pane">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control text-center" dir="ltr" name="footer_col3_title" value="<?php echo e($_setting['footer_col3_title'] ?? ''); ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="summernote" name="footer_col3_content"><?php echo $_setting['footer_col3_content'] ?? ''; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary pull-left" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div id="col4" class="tab-pane">
                    <form method="post" action="/admin/setting/store" class="form-horizontal form-bordered">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control text-center" dir="ltr" name="footer_col4_title" value="<?php echo e($_setting['footer_col4_title'] ?? ''); ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="summernote" name="footer_col4_content"><?php echo $_setting['footer_col4_content'] ?? ''; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary pull-left" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Settings','Footer']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/admin/setting/footer.blade.php ENDPATH**/ ?>
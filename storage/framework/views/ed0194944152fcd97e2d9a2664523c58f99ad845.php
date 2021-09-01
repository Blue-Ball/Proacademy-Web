<div id="ImageModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="z-index: 1050">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>
                    <img src="#" class="img-responsive" style="max-width: 100%"/>
                </p>
            </div>
        </div>

    </div>
</div>

<div id="VideoModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="z-index: 1050">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>
                    <video width="570" controls>
                        <source src="#" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                </p>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index: 1050">
        <div class="modal-content">
            <div class="modal-header">
                <?php echo e(trans('admin.system_alert')); ?>

            </div>
            <div class="modal-body">
                <?php echo e(trans('admin.are_you_sure')); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('main.cancel')); ?></button>
                <a class="btn btn-danger btn-ok"><?php echo e(trans('main.yes_sure')); ?></a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-withdraw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index: 1050">
        <div class="modal-content">
            <div class="modal-header">
                <?php echo e(trans('admin.system_alert')); ?>

            </div>
            <div class="modal-body">
                <p><?php echo e(trans('admin.withdrawal_modal_main')); ?></p>
                <p>
                <form method="post" id="withdraw-form">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label class="control-label"> <?php echo e(trans('admin.withdrawal_modal_desc')); ?></label>
                        <input type="text" class="form-control" name="description" placeholder="Your description...">
                    </div>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-ok" type="submit"><?php echo e(trans('admin.withdrawal_confirmation_button')); ?></button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('admin.cancel')); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploader-modal" role="dialog">
    <div class="modal-dialog" style="z-index: 1050;max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-body">
                <iframe src="/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>

<?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/admin/newlayout/modals.blade.php ENDPATH**/ ?>
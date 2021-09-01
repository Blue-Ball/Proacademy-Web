<?php echo $__env->make(getTemplate().'.view.layout.header',['title'=>'User Panel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make(getTemplate().'.user.layout_user.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title','Courses'); ?>
<div class="h-20"></div>
<div class="container-fluid">
    <div class="container">
        <div class="col-md-12 col-xs-12">
            <ul class="nav nav-tabs nav-justified panel-tabs" role="tablist">
                <li class="<?php echo $__env->yieldContent('tab1'); ?>">
                    <a href="/user/quizzes">
                        <span class="submicon mdi mdi-newspaper-variant-multiple-outline"></span>
                        <?php echo e(trans('main.quizzes')); ?>

                    </a>
                </li>
                <li class="<?php echo $__env->yieldContent('tab2'); ?>">
                    <a href="/user/certificates">
                        <span class="submicon mdi mdi-certificate"></span>
                        <?php echo e(trans('main.certificates')); ?>

                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane fade in" id="tab1">
                    <?php echo $__env->yieldContent('tab'); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->startSection('script'); ?>
    <script>$('#buy-hover').addClass('item-box-active');</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.user.layout.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make(getTemplate().'.view.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/user/layout_user/quizzes.blade.php ENDPATH**/ ?>
<div class="container-fluid">
    <div class="row">
        <div class="parts-slider" style="background:url('<?php echo e(get_option('main_page_slide','/assets/default/images/view/sample/slider-sample.png')); ?>');">
            <div class="col-xs-12 col-md-4 col-md-offset-4 parts-slider-container">
                <h2><?php echo e(get_option('main_page_slide_title','')); ?></h2>
                <span><?php echo e(get_option('main_page_slide_text','')); ?></span>
                <div class="parts-slider-button">
                    <a href="<?php echo get_option('main_page_slide_btn_1_url','/'); ?>"><?php echo e(get_option('main_page_slide_btn_1_text','')); ?></a>
                    <a href="<?php echo get_option('main_page_slide_btn_2_url','/'); ?>"><?php echo e(get_option('main_page_slide_btn_2_text','')); ?></a>
                </div>
            </div>
            <i class="fa fa-angle-down down-flesh"></i>
        </div>
    </div>
</div>
<?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/view/parts/slider.blade.php ENDPATH**/ ?>
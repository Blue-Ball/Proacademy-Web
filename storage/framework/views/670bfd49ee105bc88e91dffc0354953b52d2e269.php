<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.users_report_page_title')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <div class="row">
        <div class="col-xs-6 col-md-3 col-sm-6 text-center">
            <section class="card bg-warning">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"><?php echo e(trans('admin.total_users')); ?></h4>
                                <div class="info">
                                    <strong class="amount"><?php echo e($userCount); ?></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="/admin/user/lists" class="text text-uppercase"><?php echo e(trans('admin.users_list')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xs-6 col-md-3 col-sm-6 text-center">
            <section class="card bg-info">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"><?php echo e(trans('admin.total_employees')); ?></h4>
                                <div class="info">
                                    <strong class="amount"><?php echo e($adminCount); ?></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a href="/admin/manager/lists" class="text text-uppercase"><?php echo e(trans('admin.employees_list')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xs-6 col-md-3 col-sm-6 text-center">
            <section class="card bg-success">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"><?php echo e(trans('admin.total_customers')); ?></h4>
                                <div class="info">
                                    <strong class="amount"><?php echo e($buyerCount); ?></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text text-uppercase"><?php echo e(trans('admin.customers_deff')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xs-6 col-md-3 col-sm-6 text-center">
            <section class="card bg-danger">
                <div class="card-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"><?php echo e(trans('admin.total_sellers')); ?></h4>
                                <div class="info">
                                    <strong class="amount"><?php echo e($sellerCount); ?></strong>
                                </div>
                            </div>
                            <div class="summary-footer">
                                <a class="text text-uppercase"><?php echo e(trans('admin.seller_deff')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <section class="card">
        <div class="card-body">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php for($i=1;$i<get_option('chart_day_count',10)+1;$i++): ?>
                        "<?php echo date("m/d",strtotime('-'.$i.' day')+12600); ?>",
                    <?php endfor; ?>
                ],
                datasets: [{
                    label: 'Registered Users',
                    data: [
                        <?php for($i=1;$i<get_option('chart_day_count',10)+1;$i++): ?>
                        <?php echo groupDay($dayRegister,$i); ?>,
                        <?php endfor; ?>
                    ],
                    backgroundColor: [
                        'rgba(2,22,222, 0.2)',
                    ],
                    borderColor: [
                        'rgba(1,11,111, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Report','Users']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/admin/report/user.blade.php ENDPATH**/ ?>
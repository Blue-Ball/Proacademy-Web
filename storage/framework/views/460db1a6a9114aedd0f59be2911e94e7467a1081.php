<?php $__env->startSection('title'); ?>
    <?php echo e(!empty($setting['site']['site_title']) ? $setting['site']['site_title'] : ''); ?>

    - <?php echo e($quiz->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="/assets/default/clock-counter/flipTimer.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2 quiz-wizard">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <div>
                            <div>
                                <h2 class="quiz-name"><?php echo e($quiz->name); ?></h2>
                                <span class="course-name d-block"><?php echo e($quiz->content->title); ?></span>
                            </div>
                            <div class="quiz-info">
                                <span>Question : <small><?php echo e(count($quiz->questions)); ?></small></span>
                                <span>Pass Mark : <small><?php echo e($quiz->pass_mark); ?></small></span>
                                <span>Total Mark : <small><?php echo e((count($quiz->questionsGradeSum) > 0) ? $quiz->questionsGradeSum[0]->grade_sum : 0); ?></small></span>
                            </div>
                        </div>
                        <div class="quiz-time">
                            <?php if(!empty($quiz->time)): ?>
                                <div class="flipTimer">
                                    <?php if($quiz->time > 60): ?>
                                        <div class="hours">
                                            <span class="time-title"><?php echo e(trans('main.hour')); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="minutes"><span class="time-title"><?php echo e(trans('main.minute')); ?></span></div>
                                    <div class="seconds"><span class="time-title"><?php echo e(trans('main.second')); ?></span></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form id="quizForm" action="/user/quizzes/<?php echo e($quiz->id); ?>/store_results" method="post" class="quiz-form">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="quiz_result_id" value="<?php echo e($newQuizStart->id); ?>">
                                <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <fieldset>
                                        <input type="hidden" name="question[<?php echo e($question->id); ?>]" value="<?php echo e($question->id); ?>">
                                        <div class="form-card">
                                            <h3 class="question-title"><?php echo e($loop->iteration); ?> - <?php echo e($question->title); ?></h3>
                                            <?php if($question->type == 'multiple' and count($question->questionsAnswers)): ?>
                                                <div class="answer-items">
                                                    <?php $__currentLoopData = $question->questionsAnswers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($answer->title)): ?>
                                                            <div class="form-radio">
                                                                <input id="asw<?php echo e($answer->id); ?>" type="radio" name="question[<?php echo e($question->id); ?>][answer]" value="<?php echo e($answer->id); ?>">
                                                                <label class="answer-label" for="asw<?php echo e($answer->id); ?>">
                                                                    <span class="answer-title"><?php echo e($answer->title); ?></span>
                                                                </label>
                                                            </div>
                                                        <?php elseif(!empty($answer->image)): ?>
                                                            <div class="form-radio">
                                                                <input id="asw<?php echo e($answer->id); ?>" type="radio" name="question[<?php echo e($question->id); ?>][answer]" value="<?php echo e($answer->id); ?>">
                                                                <label for="asw<?php echo e($answer->id); ?>">
                                                                    <div class="image-container">
                                                                        <img src="<?php echo e($answer->image); ?>" class="fit-image" alt="">
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php elseif($question->type == 'descriptive'): ?>
                                                <textarea name="question[<?php echo e($question->id); ?>][answer]" rows="6" class="form-control"></textarea>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-actions d-flex align-items-center">
                                            <?php if($loop->iteration > 1): ?>
                                                <button type="button" class="action-button previous btn btn-custom">prev Step</button>
                                            <?php endif; ?>
                                            <?php if($loop->iteration < $loop->count): ?>
                                                <button type="button" class="action-button next btn btn-custom">Next Step</button>
                                            <?php endif; ?>
                                            <button type="button" class="action-button finish btn btn-danger">finish</button>
                                        </div>
                                    </fieldset>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="finishModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="z-index: 1050">
            <!-- Modal content-->
            <div class="modal-content modal-sm">
                <div class="modal-body" style="padding: 32px;text-align: center">
                    <p><?php echo e(trans('main.finish_quiz_alert')); ?></p>
                    <div class="d-flex align-items-center" style="margin-top: 24px ;justify-content: space-around">
                        <button id="SubmitResult" class=" btn btn-custom">
                            <?php echo e(trans('main.yes_sure')); ?>

                        </button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo e(trans('main.cancel')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="application/javascript" src="/assets/default/clock-counter/jquery.flipTimer.js"></script>
    <script>

        $(document).ready(function () {
                <?php if(isset($quiz->time)): ?>
            var currentTime = new Date();
            currentTime.setMinutes(currentTime.getMinutes() + <?php echo e($quiz->time); ?>);


            $('.flipTimer').flipTimer({
                direction: 'down',
                date: currentTime,
                callback: function () {
                    $('body .action-button.finish').remove();
                    $('#quizForm').submit();
                },
            });
                <?php endif; ?>

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function () {

                current_fs = $(this).parent().parent();
                next_fs = $(this).parent().parent().next();

                next_fs.show();

                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });

            });

            $(".previous").click(function () {

                current_fs = $(this).parent().parent();
                previous_fs = $(this).parent().parent().prev();

                previous_fs.show();


                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $('body').on('click', '.action-button.finish', function (e) {
                e.preventDefault();
                $('#finishModal').modal('show');
            });

            $('body').on('click', '#SubmitResult', function (e) {
                e.preventDefault();
                $('#quizForm').submit();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.view.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/user/quizzes/start.blade.php ENDPATH**/ ?>
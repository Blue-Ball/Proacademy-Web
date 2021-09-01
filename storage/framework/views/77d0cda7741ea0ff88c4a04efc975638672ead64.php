<?php $__env->startSection('title'); ?>
    <?php echo e(!empty($setting['site']['site_title']) ? $setting['site']['site_title'] : ''); ?>

    - <?php echo e($quiz->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
    <!-- MultiStep Form -->
    <style>
        .form-radio{
            position: relative;
        }
        .your_answer{
            position: absolute;
            width: auto;
            background: red;
            color: white;
            padding: 4px 8px;
            text-align: center;
            font-size: 0.8em;
            left: 0;
            top: 10px;
        }
    </style>
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
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form id="quizForm" class="quiz-form">
                                <?php $__currentLoopData = $quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <fieldset class="question-<?php echo $question->id; ?>">
                                        <input type="hidden" name="question[<?php echo e($question->id); ?>]" value="<?php echo e($question->id); ?>">
                                        <div class="form-card">
                                            <h3 class="question-title"><?php echo e($loop->iteration); ?> - <?php echo e($question->title); ?></h3>
                                            <?php if($question->type == 'multiple' and count($question->questionsAnswers)): ?>
                                                <div class="answer-items">
                                                    <?php $__currentLoopData = $question->questionsAnswers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($answer->title)): ?>
                                                            <div class="form-radio">
                                                                <label class="answer-label" <?php if($answer->correct == 1): ?> style="background: lightskyblue;" <?php endif; ?> for="asw<?php echo e($answer->id); ?>">
                                                                    <span class="answer-title"><?php echo e($answer->title); ?></span>
                                                                </label>
                                                                <?php if(isset($answers[$question->id]['answer']) && $answers[$question->id]['answer'] == $answer->id): ?>
                                                                    <span class="your_answer"><?php echo trans('admin.your_answer'); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php elseif(!empty($answer->image)): ?>
                                                            <div class="form-radio">
                                                                <label for="asw<?php echo e($answer->id); ?>">
                                                                    <div class="image-container" <?php if($answer->correct == 1): ?> style="border:2px solid lightskyblue;" <?php endif; ?>>
                                                                        <img src="<?php echo e($answer->image); ?>" class="fit-image" alt="">
                                                                    </div>
                                                                </label>
                                                                <?php if(isset($answers[$question->id]['answer']) && $answers[$question->id]['answer'] == $answer->id): ?>
                                                                    <span class="your_answer"><?php echo trans('admin.your_answer'); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php elseif($question->type == 'descriptive'): ?>
                                                <textarea name="question[<?php echo e($question->id); ?>][answer]" rows="6" class="form-control"><?php if(isset($answers[$question->id]['answer']) && $answers[$question->id]['answer'] != ''): ?><?php echo $answers[$question->id]['answer'] ?? ''; ?><?php endif; ?></textarea>
                                            <?php endif; ?>
                                            <?php if($question->answer_video !=''): ?>
                                                <div class="text-center">
                                                    <br><br>
                                                    <a href="#solution_<?php echo $question->id; ?>" class="btn btn-primary" data-toggle="modal"><?php echo trans('admin.video_solution'); ?></a>
                                                </div>
                                                <div class="modal fade" id="solution_<?php echo $question->id; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">&times;
                                                                </button>
                                                                <h4 class="modal-title"><?php echo trans('admin.video_solution'); ?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php echo $question->answer_video ?? ''; ?>

                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-actions d-flex align-items-center">
                                            <?php if($loop->iteration > 1): ?>
                                                <button type="button" class="action-button previous btn btn-custom">prev Step</button>
                                            <?php endif; ?>
                                            <?php if($loop->iteration < $loop->count): ?>
                                                <button type="button" class="action-button next btn btn-custom">Next Step</button>
                                            <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
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
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.view.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/user/quizzes/review.blade.php ENDPATH**/ ?>
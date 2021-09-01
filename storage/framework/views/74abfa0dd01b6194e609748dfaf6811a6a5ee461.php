<?php if($user['vendor'] == 1): ?>
    <?php $__env->startSection('tab3','active'); ?>
<?php else: ?>
    <?php $__env->startSection('tab1','active'); ?>
<?php endif; ?>

<?php $__env->startSection('tab'); ?>
    <?php if($user->vendor): ?>
        <div class="row">
            <div class="accordion-off col-xs-12">
                <ul id="accordion" class="accordion off-filters-li">
                    <li class="open">
                        <div class="link">
                            <h2><?php echo e(!empty($quiz) ? trans('main.edit_quizzes') : trans('main.create_new_quizzes')); ?></h2>
                            <i class="mdi mdi-chevron-down"></i>
                        </div>
                        <ul class="submenu" style="display: block;">
                            <div class="h-10"></div>
                            <form action="/user/quizzes/<?php echo e(!empty($quiz) ? 'update/'.$quiz->id : 'store'); ?>" method="post" class="form">
                                <?php echo e(csrf_field()); ?>


                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <div class="form-group <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <label class="control-label tab-con"><?php echo e(trans('main.quiz_name')); ?></label>
                                            <input type="text" name="name" value="<?php echo e(!empty($quiz) ? $quiz->name : old('name')); ?>" class="form-control">
                                            <div class="help-block"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pull-left">
                                        <div class="form-group <?php $__errorArgs = ['content_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <label class="control-label tab-con"><?php echo e(trans('main.course')); ?></label>
                                            <select name="content_id" class="form-control font-s">
                                                <option selected disabled><?php echo e(trans('main.select_course')); ?></option>
                                                <?php $__currentLoopData = $user->contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($content->id); ?>" <?php echo e((!empty($quiz) and $quiz->content_id == $content->id) ? 'selected' : ''); ?>><?php echo e($content->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="help-block"><?php $__errorArgs = ['content_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <div class="form-group">
                                            <label class="control-label tab-con"><?php echo e(trans('main.quiz_time')); ?> (<?php echo e(trans('main.minute')); ?>)</label>
                                            <input type="number" name="time" value="<?php echo e(!empty($quiz) ? $quiz->time : old('time')); ?>" placeholder="Empty means infinity" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 pull-left">
                                        <div class="form-group">
                                            <label class="control-label tab-con"><?php echo e(trans('main.quiz_number_attempt')); ?></label>
                                            <input type="number" name="attempt" value="<?php echo e(!empty($quiz) ? $quiz->attempt : old('attempt')); ?>" placeholder="Empty means infinity" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <div class="form-group <?php $__errorArgs = ['pass_mark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <label class="control-label tab-con"><?php echo e(trans('main.quiz_pass_mark')); ?></label>
                                            <input type="number" name="pass_mark" value="<?php echo e(!empty($quiz) ? $quiz->pass_mark : old('pass_mark')); ?>" class="form-control">
                                            <div class="help-block"><?php $__errorArgs = ['pass_mark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pull-left">
                                        <div class="form-group">
                                            <label class="control-label tab-con"><?php echo e(trans('main.certificate')); ?></label>
                                            <div class="switch switch-sm switch-primary" style="width: 100%">
                                                <input type="hidden" value="0" name="certificate">
                                                <input type="checkbox" name="certificate" value="1" data-plugin-ios-switch <?php echo e((!empty($quiz) and $quiz->certificate) ? 'checked' : ''); ?> />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <div class="form-group">
                                            <label class="control-label tab-con"><?php echo e(trans('main.status')); ?></label>
                                            <select name="status" class="form-control font-s">
                                                <option value="disabled" <?php echo e((!empty($quiz) and $quiz->status == 'disabled') ? 'selected' : ''); ?>><?php echo e(trans('main.disabled')); ?></option>
                                                <option value="active" <?php echo e((!empty($quiz) and $quiz->status == 'active') ? 'selected' : ''); ?>><?php echo e(trans('main.active')); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pull-left">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-custom" style="margin-top: 20px">
                                                <span><?php echo e(trans('main.save_changes')); ?></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div class="h-10"></div>
                        </ul>
                    </li>

                    <?php if(empty($quiz)): ?>
                        <li class="open">
                            <div class="link"><h2><?php echo e(trans('main.quizzes_list')); ?></h2><i class="mdi mdi-chevron-down"></i></div>
                            <ul class="submenu dblock">
                                <div class="h-10"></div>
                                
                                <?php if(empty($quizzes)): ?>
                                    <div class="text-center">
                                        <img src="/assets/default/images/empty/Request.png">
                                        <div class="h-20"></div>
                                        <span class="empty-first-line"><?php echo e(trans('main.no_quizzes')); ?></span>
                                        <div class="h-10"></div>

                                        <div class="h-20"></div>
                                    </div>
                                <?php else: ?>
                                    <div class="table-responsive">
                                        <table class="table ucp-table" id="request-table">
                                            <thead class="thead-s">
                                            <th class="cell-ta"><?php echo e(trans('main.name')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.students')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.questions')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.average_grade')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.review_needs')); ?></th>
                                            <th class="text-center"><?php echo e(trans('main.status')); ?></th>
                                            <th class="text-center" width="100"><?php echo e(trans('main.controls')); ?></th>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?php echo e($quiz->name); ?>

                                                        <small style="display: block">(<?php echo e($quiz->content->title); ?>)</small>
                                                    </td>
                                                    <td class="text-center"><?php echo e(count($quiz->QuizResults)); ?></td>
                                                    <td class="text-center"><?php echo e(count($quiz->questions)); ?></td>
                                                    <td class="text-center"><?php echo e($quiz->average_grade); ?></td>
                                                    <td class="text-center"><?php echo e($quiz->review_needs); ?></td>
                                                    <td class="text-center">
                                                        <?php if($quiz->status == 'active'): ?>
                                                            <b class="c-g"><?php echo e(trans('admin.active')); ?></b>
                                                        <?php else: ?>
                                                            <span class="c-r"><?php echo e(trans('admin.disabled')); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center" width="250">
                                                        <a href="/user/quizzes/edit/<?php echo e($quiz->id); ?>" class="gray-s" data-toggle="tooltip" title="<?php echo e(trans('main.edit_quizzes')); ?>"><span class="crticon mdi mdi-lead-pencil"></span></a>
                                                        <a href="/user/quizzes/<?php echo e($quiz->id); ?>/questions" class="gray-s" data-toggle="tooltip" title="<?php echo e(trans('main.questions')); ?>">
                                                            <span class="crticon mdi mdi-account-question"></span>
                                                        </a>
                                                        <a href="/user/quizzes/<?php echo e($quiz->id); ?>/results" class="gray-s" data-toggle="tooltip" title="<?php echo e(trans('main.show_results')); ?>">
                                                            <span class="crticon mdi mdi-eye"></span>
                                                        </a>
                                                        <button data-id="<?php echo e($quiz->id); ?>" class="gray-s btn-transparent btn-delete-quiz" data-toggle="tooltip" title="<?php echo e(trans('main.delete')); ?>"><span class="crticon mdi mdi-delete-forever"></span></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="h-10"></div>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="h-20"></div>
            <div class="off-filters-li" style="padding: 15px">
                <div class="table-responsive">
                    <table class="table ucp-table" id="request-table">
                        <thead class="thead-s">
                        <th class="cell-ta"><?php echo e(trans('main.name')); ?></th>
                        <th class="text-center"><?php echo e(trans('main.course')); ?></th>
                        <th class="text-center"><?php echo e(trans('main.quiz_grade')); ?></th>
                        <th class="text-center"><?php echo e(trans('main.you_grade')); ?></th>
                        <th class="text-center"><?php echo e(trans('main.quiz_number_attempt')); ?></th>
                        <th class="text-center"><?php echo e(trans('main.quiz_time')); ?> (min)</th>
                        <th class="text-center"><?php echo e(trans('main.time_and_date')); ?></th>
                        <th class="text-center"><?php echo e(trans('main.status')); ?></th>
                        <th class="text-center"><?php echo e(trans('main.controls')); ?></th>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo e($quiz->name); ?>

                                </td>
                                <td class="text-center"><?php echo e($quiz->content->title); ?></td>
                                <td class="text-center"><?php echo e((count($quiz->questionsGradeSum) > 0) ? $quiz->questionsGradeSum[0]->grade_sum : 0); ?></td>
                                <td class="text-center"><?php echo e((!empty($quiz->result) and isset($quiz->result)) ? $quiz->result->user_grade : 'No grade'); ?></td>
                                <td class="text-center"><?php echo e($quiz->attempt - $quiz->result_count); ?></td>
                                <td class="text-center"><?php echo e($quiz->time); ?></td>
                                <td class="text-center"><?php echo e(date('Y-m-d | H:i', $quiz->created_at)); ?></td>
                                <td class="text-center">
                                    <?php if(!empty($quiz->result) and isset($quiz->result)): ?>
                                        <?php if($quiz->result->status == 'pass'): ?>
                                            <span class="badge badge-success"><?php echo e(trans('main.passed')); ?></span>
                                        <?php elseif($quiz->result->status == 'fail'): ?>
                                            <span class="badge badge-danger"><?php echo e(trans('main.failed')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-warning"><?php echo e(trans('main.waiting')); ?></span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="badge badge-warning"><?php echo e(trans('main.no_term')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($quiz->can_try): ?>
                                        <a href="<?php echo e(($quiz->can_try) ? '/user/quizzes/'. $quiz->id .'/start' : ''); ?>" target="_blank" <?php echo e((!$quiz->can_try) ? 'disabled="disabled"' : ''); ?> class="btn btn-success btn-round"><?php echo e(trans('main.start')); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo e('/user/quizzes/'. $quiz->id .'/review?id='.$quiz->answer_id); ?>" target="_blank" class="btn btn-warning btn-round"><?php echo e(trans('main.review')); ?></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div id="quizzesDelete" class="modal fade" role="dialog">
        <div class="modal-dialog" style="z-index: 1050">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3><?php echo e(trans('main.delete')); ?></h3>
                </div>
                <div class="modal-body" style="max-height: 550px;overflow-y: scroll">
                    <p><?php echo e(trans('main.quiz_delete_alert')); ?></p>
                    <div>
                        <a href="" class=" btn btn-danger delete">
                            <?php echo e(trans('main.yes_sure')); ?>

                        </a>
                        <button type="button" data-dismiss="modal" class="btn btn-info"><?php echo e(trans('main.cancel')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $('body').on('click', '.btn-delete-quiz', function (e) {
            e.preventDefault();
            var quiz_id = $(this).attr('data-id');
            $('#quizzesDelete').modal('show');
            $('#quizzesDelete').find('.delete').attr('href', '/user/quizzes/delete/' + quiz_id);
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($user['vendor'] == 1 ? getTemplate() . '.user.layout.videolayout' : getTemplate() . '.user.layout_user.quizzes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\web\laravel\20210826(Proacade)\proacademy-27\laravel\resources\views/web/default/user/quizzes/list.blade.php ENDPATH**/ ?>
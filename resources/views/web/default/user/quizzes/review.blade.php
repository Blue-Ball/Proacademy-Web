@extends(getTemplate().'.view.layout.layout')
@section('title')
    {{ !empty($setting['site']['site_title']) ? $setting['site']['site_title'] : '' }}
    - {{ $quiz->name }}
@endsection
@section('page')
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
                                <h2 class="quiz-name">{{ $quiz->name }}</h2>
                                <span class="course-name d-block">{{ $quiz->content->title }}</span>
                            </div>
                            <div class="quiz-info">
                                <span>Question : <small>{{ count($quiz->questions) }}</small></span>
                                <span>Pass Mark : <small>{{ $quiz->pass_mark }}</small></span>
                                <span>Total Mark : <small>{{ (count($quiz->questionsGradeSum) > 0) ? $quiz->questionsGradeSum[0]->grade_sum : 0 }}</small></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form id="quizForm" class="quiz-form">
                                @foreach ($quiz->questions as $question)
                                    <fieldset class="question-{!! $question->id !!}">
                                        <input type="hidden" name="question[{{ $question->id }}]" value="{{ $question->id }}">
                                        <div class="form-card">
                                            <h3 class="question-title">{{ $loop->iteration }} - {{ $question->title }}</h3>
                                            @if ($question->type == 'multiple' and count($question->questionsAnswers))
                                                <div class="answer-items">
                                                    @foreach ($question->questionsAnswers as $answer)
                                                        @if (!empty($answer->title))
                                                            <div class="form-radio">
                                                                <label class="answer-label" @if($answer->correct == 1) style="background: lightskyblue;" @endif for="asw{{ $answer->id }}">
                                                                    <span class="answer-title">{{ $answer->title }}</span>
                                                                </label>
                                                                @if(isset($answers[$question->id]['answer']) && $answers[$question->id]['answer'] == $answer->id)
                                                                    <span class="your_answer">{!! trans('admin.your_answer') !!}</span>
                                                                @endif
                                                            </div>
                                                        @elseif(!empty($answer->image))
                                                            <div class="form-radio">
                                                                <label for="asw{{ $answer->id }}">
                                                                    <div class="image-container" @if($answer->correct == 1) style="border:2px solid lightskyblue;" @endif>
                                                                        <img src="{{ $answer->image }}" class="fit-image" alt="">
                                                                    </div>
                                                                </label>
                                                                @if(isset($answers[$question->id]['answer']) && $answers[$question->id]['answer'] == $answer->id)
                                                                    <span class="your_answer">{!! trans('admin.your_answer') !!}</span>
                                                                @endif
                                                            </div>
                                                        @endif

                                                    @endforeach
                                                </div>
                                            @elseif ($question->type == 'descriptive')
                                                <textarea name="question[{{ $question->id }}][answer]" rows="6" class="form-control">@if(isset($answers[$question->id]['answer']) && $answers[$question->id]['answer'] != ''){!! $answers[$question->id]['answer'] ?? '' !!}@endif</textarea>
                                            @endif
                                            @if($question->answer_video !='')
                                                <div class="text-center">
                                                    <br><br>
                                                    <a href="#solution_{!! $question->id !!}" class="btn btn-primary" data-toggle="modal">{!! trans('admin.video_solution') !!}</a>
                                                </div>
                                                <div class="modal fade" id="solution_{!! $question->id !!}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">&times;
                                                                </button>
                                                                <h4 class="modal-title">{!! trans('admin.video_solution') !!}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                {!! $question->answer_video ?? '' !!}
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            @endif
                                        </div>
                                        <div class="card-actions d-flex align-items-center">
                                            @if ($loop->iteration > 1)
                                                <button type="button" class="action-button previous btn btn-custom">prev Step</button>
                                            @endif
                                            @if ($loop->iteration < $loop->count)
                                                <button type="button" class="action-button next btn btn-custom">Next Step</button>
                                            @endif
                                        </div>
                                    </fieldset>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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
@endsection

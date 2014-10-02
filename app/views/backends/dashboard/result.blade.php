@extends('layouts.masterbackend')
@section('content')

	<div class="col-md-12">
            <div class="row">
            <div class="col-md-12">
               <!-- BEGIN EXAMPLE TABLE PORTLET-->
               <div class="portlet box light-grey">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-globe"></i>{{ $labelPage }} : {{ $resultScore }}</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                     </div>
                  </div>
                  <div class="portlet-body">
					{{ Form::open(array('url' => 'backends/quizz', 'role' => 'form')) }}
						<div class="form-body">
							<?php $i=1; ?>
							{{ Form::hidden('questionsLenght', sizeof($questions), array('id' => 'questions')) }}
							<h1 style="text-align: center; margin-bottom: 50px">{{ $resultScore }}</h1>
							@if(isset($resultActive))
								@if($resultActive==0 || Auth::user()->user_role_id==2)
									@foreach($questions as $question)
										{{ Form::hidden('currentQuestion'.$i, $question->id) }} 
										<div class="form-group">
											<div class="col-md-12" style="text-align: center;">
												{{ $i++ }} - {{ Form::label('topic', $question->topic) }} 
												<?php
													foreach($resultQuestionId as $k=>$v){
														if($k == $question->id){
															$questionId = $k;
															$answersId = $v;
														}
													}
												?>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-12" style="padding: 0px 30px">
											<?php $answerSelect = Answer::where('id', $answersId)->where('question_id', $questionId)->orderBy('id', 'asc')->first(); ?>
												<div class="radio-list">
													<label class="">
														@if($answersId == $question->correct_answer)
															<?php $iconAnswer = "icon-ok top-news-icon";?>
															<?php $styleAnswer = "btn green";?>
															<?php $urAnswer = 'You answered correct.'?>
														@else	
															<?php $iconAnswer = "icon-remove top-news-icon";?>
															<?php $styleAnswer = "btn red";?>
															<?php $urAnswer = 'You answered incorrect.'?>
														@endif

														<div class="top-news">
															<a class="{{ $styleAnswer }}" href="#">
																<span>{{ $urAnswer }}</span>
																<em>
																{{ Form::label($answerSelect['id'] , $answerSelect['answer_title'], array('style' => "")) }}
																</em>
																<i class="{{ $iconAnswer }}"></i>
															</a>
														</div>

													</label>
												</div>

												<?php $answers = Answer::where('question_id', $questionId)->get(); ?>
												@foreach($answers as $answer)	
													@if($question->correct_answer==$answer->id)
														@if($answer->id!=$answerSelect['id'])
															<div class="top-news" style="margin-top: -10px;">
																<a class="btn green" href="#">
																	<span>Correct Answer.</span>
																	<em>
																	{{ Form::label($answer->id , $answer->answer_title, array('style' => '')) }} 
																	</em>
																	<i class="icon-ok top-news-icon"></i>
																</a>
															</div>
														@endif
													@endif
												@endforeach
											</div>
										</div>
										<hr>
									@endforeach	
								@endif
							@endif		
						</div>
						<div class="table-toolbar">
							<div class="btn-group">
								@if(isset($resultActive))
									@if($resultActive!=0)
										{{ HTML::decode(HTML::link('backends/dashboard', 'Try again <i class="icon-ok"></i>', array('class' => 'btn yellow', 'id' => ''))) }}
									@endif
								@endif
							</div>
						</div>
						</div>
					{{ Form::close() }}
                  </div>
               </div>
               <!-- END EXAMPLE TABLE PORTLET-->
            </div>
         </div>
    </div>
@stop

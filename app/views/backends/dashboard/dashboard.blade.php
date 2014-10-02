@extends('layouts.masterbackend')
@section('content')
	<div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
               <!-- BEGIN EXAMPLE TABLE PORTLET-->
               	<div class="portlet box light-grey">
					<div class="portlet-title">
						<div class="caption"><i class="icon-globe"></i>
							{{ $labelPage }}
							@if(Session::has('flash_message'))
								: {{ Session::get('flash_message') }}
							@endif
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse"></a>
						</div>
					</div>
                  
					<div class="portlet-body">
						{{ Form::open(array('url' => 'backends/quizz', 'role' => 'form')) }}
							<div class="form-body">
								<?php $i=1; ?>
								{{ Form::hidden('questionsLenght', sizeof($questions), array('id' => 'questions')) }}
								@foreach($questions as $question)
									{{ Form::hidden('currentQuestion'.$i, $question->id) }} 
									<div class="form-group">
										<div class="col-md-11">
											{{ $i++ }} - {{ Form::label('topic', $question->topic) }}

											<?php $answers = Answer::where('question_id', $question->id)->orderBy('id', 'asc')->get(); ?>
											@foreach($answers as $answer)	
												<div class="radio-list">
													<label>
														@if($formOrigin=='dashboard')
														<?php $j = $i-1;?>
														{{ Form::radio('optionsRadios'.$j.$question->id, $answer->id, (Input::old('optionsRadios'.$j) == $answer->id), array('id'=>'optionsRadio', 'class'=>'radio optionsRadios'.$j)) }}
														@endif
														{{ Form::label($answer->id , $answer->answer_title) }}
													</label>
												</div>
											@endforeach	
										</div>

										@if(Auth::user()->user_role_id==2)
											<div class="col-md-1">
												<div class="pull-right" data-id="{{ $question->id }}" data-title="{{ htmlentities($question->topic, ENT_QUOTES, 'UTF-8') }}"> 
													{{ HTML::decode(HTML::link('backends/quizz/edit/'.$question->id, '<i class="icon-edit"></i>.Edit', array('class' => '', 'style' => 'margin-bottom: 5px; color: blue;'))) }}<br>
													{{ HTML::decode(HTML::link("#", '<i class="icon-trash"></i>.Delete', array('class' => 'config deleteQuestion', 'style' => 'color: red;', 'data-toggle' => 'modal'))) }}
												</div>	
											</div>
										@endif
									</div>
								@endforeach	
							</div>
							<div class="table-toolbar">
								<div class="btn-group">
									@if($formOrigin=='dashboard')
										<div class="col-md-5">
											<button class="btn green" type="submit">
											Continu<i class="icon-ok"></i>
											</button>
										</div>
										<div class="col-md-5">
											@if($viewResult==true)
												{{ HTML::decode(HTML::link('backends/dashboard/viewresult', 'View Result<i class="icon-ok"></i>', array('class' => 'btn yellow'))) }}
											@endif
										</div>
									@endif	
								</div>
							</div>
						{{ Form::close() }}
					</div>
           		</div>
           		<!-- END EXAMPLE TABLE PORTLET-->
            </div>
     	</div>
    </div>
    @if(isset($question))	
		{{ DialogMessage::deleteQuestion() }}
	@endif	
@stop
@section('javaScript')
	<script type="text/javascript">
		$(function (){
			$('.deleteQuestion').click(function(){ 
				var questionId = $( this ).parent().data('id');
				var questionTitle = $( this ).parent().data('title');
				
				$('#deleteQues').modal();
				$("#questionTitle").html(questionTitle);
				$('.btn-deleteQuestion').click(function () {  
	                window.location.href = "{{ URL::to('backends/dashboard/deletequestion') }}"  + "?keyword=" + questionId;
					return false;
	            });
				
			});
		});
	</script>
@stop
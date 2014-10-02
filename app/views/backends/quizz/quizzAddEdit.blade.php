@extends('layouts.masterbackend')
@section('content')
	<div class="col-md-12">
            <div class="row">
            <div class="col-md-12">
               <!-- BEGIN EXAMPLE TABLE PORTLET-->
               <div class="portlet box light-grey">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-globe"></i>{{ $labelPage }}</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                     </div>
                  </div>
                  <div class="portlet-body">
					{{ Form::open(array('url' => 'backends/quizz/save', 'role' => 'form')) }}
						{{ Form::hidden('formOrigin', $formOrigin) }}
						{{ Form::hidden('id', isset($id)?$id:'') }}
						<div class="form-body">
							<div class="form-group">
                              	{{ Form::label('topic', "Topic") }}
                              	@if($errors->has('topic'))
                              		: <span style="color: #b94a48;"><i></i>{{ $errors->first('topic') }}</span>
                              	@endif
                              	{{ Form::textarea('topic', isset($question)?e($question->topic):'', ['size' => '0x6', 'class' => 'form-control']) }}
                           	</div>

                           	@if($formOrigin=='edit')
	                           	<div class="form-group">
		                            <div class="col-md-10">
		                            	{{ Form::label('addAnswer', "Add Answer") }}	
		                            	{{ Form::text('answer',Input::old('answer')?e(htmlspecialchars(Input::old('answer'), ENT_QUOTES)):'', array('id' => 'answer[]','class' => 'form-control', 'placeholder' => 'Add answer')) }}
		                        	</div>
		                        	<div class="col-md-2">
		                        		{{ Form::label('', "-") }}	
		                        		<div class="table-toolbar">
											<div class="btn-group">
												{{ HTML::decode(HTML::link("#", 'Add <i class="icon-plus"></i>', array('class' => 'btn red addAnswer'))) }}
											</div>
										</div>
		                        	</div>
		                        </div>
		                        <div class=" form-group">
		                        	<?php $i=1;?>
		                        	@foreach($answers as $answer)		
		                        		<ul>
		                        			<li style="list-style: none;" data-id="{{ $answer->id }}" data-title="{{ $answer->answer_title }}">
		                        				{{ HTML::decode(HTML::link('#', '<i class="icon-trash"></i>', array('class' => 'removeAnswre', 'data-toggle' => 'modal'))) }}
		                        				{{ HTML::decode(HTML::link('#', '<i class="icon-edit"></i>', array('class' => 'editAnswre', 'data-toggle' => 'modal'))) }}
		                        				{{ $i++ }} - {{ htmlspecialchars($answer->answer_title, ENT_QUOTES) }}
		                        			</li>
		                        		</ul>
		                        	@endforeach
		                        </div>
		                        <div class="clearfix"></div>
		                        <div class="form-group">
		                        	<div class="col-md-12">
		                        		{{ Form::label('correctAnswer', "Chose a correct answer") }}	
		                        		@if($errors->has('correct_answer'))
		                              		: <span style="color: #b94a48;"><i></i>{{ $errors->first('correct_answer') }}</span>
		                              	@endif
			                            {{ Form::select('correct_answer', $correctAnswer, isset($correctAn)?$correctAn:'',array('class' => 'form-control')) }}
		                        	</div>
		                        </div>
		                    @endif    
							<div class="table-toolbar">
								<div class="btn-group">
									<button id="sample_editable_1_new" class="btn green">
										Save <i class="icon-ok"></i>
									</button>
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
    @if(isset($answer))	
		{{ DialogMessage::editAnswer() }}
		{{ DialogMessage::deleteAnswer() }}
		{{ DialogMessage::dialogEnteranswer() }}
	@endif	
@stop
@section('javaScript')
	{{ HTML::script('assets/plugins/ckeditor/ckeditor.js') }}	
	<script type="text/javascript">
		$(function(){
			$(".addAnswer").click(function(){
				var getAnswer = $("input[name='answer']").val();
				var id = $("input[name='id']").val();
				if(getAnswer){
					window.location.href = "{{ URL::to('backends/quizz/answer') }}"  + "?keyword=" + getAnswer + "&keyword1=" + id;
					return false;
				}else{
					$('#enterNewanswer').modal();
				}
				
			});
			$('.editAnswre').click(function(){
				var answerId = $( this ).parent().data('id');
				var answerTitle = $( this ).parent().data('title');
				$("#editAntitle").val(answerTitle);
				var id = $("input[name='id']").val();
				$('#editAn').modal();

				$('.btn-editAn').click(function () {  
					var editAn = $('input[name="editAn"]').val();
					window.location.href = "{{ URL::to('backends/quizz/editanswer') }}"  + "?keyword=" + answerId + "&keyword1="+id+"&keyword2=" + editAn;
					return false;
				});
			});

			$(".removeAnswre").click(function(){ 
				var answerId = $( this ).parent().data('id');
				var answerTitle = $( this ).parent().data('title');
				var id = $("input[name='id']").val();
				$('#deleteAn').modal();
				$("#answerTitle").html(answerTitle);
				$('.btn-deleteAn').click(function () {  
	                window.location.href = "{{ URL::to('backends/quizz/removeanswer') }}"  + "?keyword=" + answerId + "&keyword1=" + id;
					return false;
	            });
			});
		});
	</script>
@stop
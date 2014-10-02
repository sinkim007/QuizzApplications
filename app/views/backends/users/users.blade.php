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
                  	<div class="clearfix"></div>
                  	<div class="form-group" style="padding: 5px 0px;">
                      <label class="col-md-10 control-label"></label>
                      <div class="col-md-2">
                      	{{ Form::select('userRole', $userRole, isset($userType)?e($userType):'', array('class' => 'form-control selectUsertype', 'style' => 'cursor: pointer;')) }}
                      </div>
                   </div>
                  	<div class="portlet box">
	                  	<div class="portlet-body">
							{{ Form::open(array('url' => 'backends/user', 'role' => 'form')) }}
								<div class="table-responsive">
									<table class="table table-hover" style="font-size: 14px;">
										<thead>
											<tr>
												<th>#</th>
												<th>Full Name</th>
												<th>Email</th>
												<th>Score</th>
												<th>Active</th>
												<th>Create</th>
												<!-- <th>Modify</th> -->
											</tr>
										</thead>
										<tbody>
											@foreach($users as $key=>$val)
												<?php 
													$activeArr = ['Test Again', 'Result'];
													if(Libenvironment::getResultsTable($val->id)['active']==1){
														$activeClass = 'label label-sm label-success';
													}else{
														$activeClass = 'label label-sm label-danger';
													}
												?>
												<tr data-id="{{ $val->id }}" data-name="{{ $val->lastname.' '.$val->firstname }}" data-active="{{Libenvironment::getResultsTable($val->id)['active']}}">
													<td>{{ str_pad($key+1, 1, '0', STR_PAD_LEFT) }}</td>
													<td>{{ $val->lastname." ".$val->firstname }}</td>
													<td>{{ $val->email }}</td>
													<td>{{ Libenvironment::getResultsTable($val->id)?e(Libenvironment::getResultsTable($val->id)['score']):"Nan" }} %</td>
													<td>
														@if(in_array($val->id, $resultArr))
															@if($val->user_role_id==1)
																{{ HTML::decode(HTML::link("#", '<span class="'.$activeClass.'">'.$activeArr[Libenvironment::getResultsTable($val->id)['active']].'</span>', array('style' => 'text-decoration: none;', 'class' => 'testAgain'))) }}
															@else
																<span class="{{ $activeClass }}">{{ $activeArr[Libenvironment::getResultsTable($val->id)['active']] }}</span>
															@endif
														@else
															<span class="label label-sm label-warning">Not Yet Test</span>
														@endif														
													</td>
													<td>{{ date('m/d/Y H:i:s', strtotime($val->created_at)) }}</td>
												</tr>
											@endforeach	
											<tr>
												<td colspan="6">{{ $users->links() }}</td>
											</tr>
										</tbody>
									</table>
								</div>
							{{ Form::close() }}
						</div>
					</div>
				</div>
               <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    {{ DialogMessage::testAgain() }}
    {{ DialogMessage::notestAgain() }}
@stop
@section('javaScript')
	<script type="text/javascript">
		$(function(){
			$('.testAgain').click(function(){
				var fullName = $( this ).parent().parent().data('name');
				var id = $( this ).parent().parent().data('id');
				var active = $( this ).parent().parent().data('active');
				
				$('.userTest').html(fullName);
				$('.dataId').val(id);
				if(active==1){
					$('#notestAgain').modal();
				}else{
					$('#testAgain').modal();
				}	
				
				$('.btn-testAgain').click(function () {  
	                var userId = $(".dataId").val();
					window.location.href = "{{  URL::to('backends/users/testagain') }}"+ "/"+ userId;
					return false;
	            });
				
			});

			$('.selectUsertype').change(function(){
				var roleId = $( this ).val();
				window.location.href = "{{ URL::to('backends/users?keyword=') }}"+roleId;
				return false;
			});
		});
	</script>
@stop
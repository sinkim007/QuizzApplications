<?php
class DialogMessage{


	public static function editAnswer(){
		return '<div class="modal fade" id="editAn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					   <div class="modal-content">
					      <div class="modal-header">
					         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					         <h4 class="modal-title">Edit answer</h4>
					      </div>
					      <div class="modal-body">
					         <input type="text" value="" class="form-control editAntitles" name="editAn" placeholder="Edit answer" id="editAntitle">	
					      </div>
					      <div class="modal-footer">
					         <button type="button" class="btn blue btn-editAn">Edit</button>
					         <button type="button" class="btn default" data-dismiss="modal">Close</button>
					      </div>
					   </div>
					   <!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>';
	}

	public static function deleteAnswer(){
		return '<div class="modal fade" id="deleteAn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					   <div class="modal-content">
					      <div class="modal-header">
					         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					         <h4 class="modal-title">Delete answer</h4>
					      </div>
					      <div class="modal-body">
					      	
					         Do you want to delete the answer "<span id="answerTitle"></span>" ?
					      </div>
					      <div class="modal-footer">
					         <button type="button" class="btn blue btn-deleteAn">Yes</button>
					         <button type="button" class="btn default" data-dismiss="modal">No</button>
					      </div>
					   </div>
					   <!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>';
	}

	public static function deleteQuestion(){
		return '<div class="modal fade" id="deleteQues" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					   <div class="modal-content">
					      <div class="modal-header">
					         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					         <h4 class="modal-title">Delete question</h4>
					      </div>
					      <div class="modal-body">
					         Do you want to delete the question below ? <br>"<span id="questionTitle"></span>" 
					      </div>
					      <div class="modal-footer">
					         <button type="button" class="btn blue btn-deleteQuestion">Yes</button>
					         <button type="button" class="btn default" data-dismiss="modal">No</button>
					      </div>
					   </div>
					   <!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>';
	}

	public static function testAgain(){
		return '<div class="modal fade" id="testAgain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					   <div class="modal-content">
					      <div class="modal-header">
					         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					         <h4 class="modal-title">Test Again</h4>
					      </div>
					      <div class="modal-body">
					         Are you sure to allow the user "<span class="userTest"></span>", test again ?
					      </div>
					      <div class="modal-footer">
					      	 <input type="hidden" value="" name="dataId" class="dataId">
					         <button type="button" class="btn blue btn-testAgain">Yes</button>
					         <button type="button" class="btn default" data-dismiss="modal">No</button>
					      </div>
					   </div>
					   <!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>';
	}
	public static function notestAgain(){
		return '<div class="modal fade" id="notestAgain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					   <div class="modal-content">
					      <div class="modal-header">
					         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					         <h4 class="modal-title">Test Again</h4>
					      </div>
					      <div class="modal-body">
					         Are you sure to don\'t allow the user "<span class="userTest"></span>", test again ?
					      </div>
					      <div class="modal-footer">
					      	 <input type="hidden" value="" name="dataId" class="dataId">
					         <button type="button" class="btn blue btn-testAgain">Yes</button>
					         <button type="button" class="btn default" data-dismiss="modal">No</button>
					      </div>
					   </div>
					   <!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>';
	}

	public static function dialogEnteranswer(){
		return '<div class="modal fade" id="enterNewanswer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" style="width: 17%;">
					   <div class="modal-content">
					      <div class="modal-header">
					         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					         <h4 class="modal-title">Warining</h4>
					      </div>
					      <div class="modal-body">
					         Please enter new answer!
					      </div>
					      <div class="modal-footer">
					         <button type="button" class="btn default" data-dismiss="modal">Ok</button>
					      </div>
					   </div>
					   <!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>';
	}
}

<?php
class AdminQuizzController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', ['on' => 'post']);
		date_default_timezone_set("Asia/Phnom_Penh");
	}
	
	public function postIndex(){ 
		$postData = Input::all();
		$Qlenght = $postData['questionsLenght'];
		$anArr = array();
		$total = 0;
		$questionArr = [];
		for($i=0; $i < $Qlenght; $i++){
			$j = $i+1;
			$currentQuestionArr = $postData["currentQuestion$j"];
			$question = Question::find($currentQuestionArr);
			$correctAn = $question->correct_answer;
			$questionId = $question->id;

			if(isset($postData['optionsRadios'.$j.$questionId])){
				$answer = $postData['optionsRadios'.$j.$questionId];  
				if ($answer == $correctAn) {          
				    $total = $total + 1;
				}
				$formOrigin = "quizz";
				$questionArr[$questionId] = $answer;
				Results::where('user_id', Auth::user()->id)->delete();
				
			}else{ return Redirect::to('backends/dashboard')->withInput()->with('flash_message', 'Please select all option to check answer.'); }	
		}

		$results = Results::create([
				'user_id' => Auth::user()->id,
				'question_quizzler_answer' => json_encode($questionArr),
				'active' => 1
		]);
		$total = ($total/$Qlenght) * 100;
		return Redirect::to('backends/dashboard?keyword='.$formOrigin."&total=".$total."&resultId=".$results->id)->withInput();
	}
	public function getAdd(){
		$data['pageTitle'] = "Quizzler | Add";
		$data['urlAddBack'] = "backends/dashboard";
		$data['btnAddBack'] = '<i class="icon-reply"></i><span>Back<span>';
		$data['labelPage'] = "Create New Question";
		$data['activeD'] = 'active';
		$data['formOrigin'] = "add";

		//$data['answerArr'] = (Object) array();

		return View::make('backends.quizz.quizzAddEdit', $data);
	}

	public function getEdit($id=0){ 
		$data['id'] = $id;
		$data['question'] = Question::find($id);
		$data['pageTitle'] = "Quizzler | Edit";
		$data['urlAddBack'] = "backends/dashboard";
		$data['btnAddBack'] = '<i class="icon-reply"></i><span>Back<span>';
		$data['labelPage'] = "Edit Question";
		$data['activeD'] = 'active';
		$data['formOrigin'] = "edit";

		$data['answers'] = Answer::where('question_id', $id)->get();

		$correctArr = ['' => '-- Select correct answer --'];
		$data['correctAnswer'] = array();
		foreach($data['answers'] as $val){
			$correctArr[$val->id] = $val->answer_title;
			$data['correctAnswer'] = $correctArr;
		}
		$data['correctAn'] = $data['question']->correct_answer;

		return View::make('backends.quizz.quizzAddEdit', $data);
	}

	public function postSave(){
		$postData = Input::all();
		if($postData['formOrigin']=="edit"){
			$rules = array(
						'topic' => 'required',
						'correct_answer' => 'required'
					);
			$validator = Validator::make($postData, $rules);
			if( $validator->fails() ){ 
				return Redirect::to('backends/quizz/edit/'.$postData['id'])->withInput()->withErrors($validator);
			} else {
				$question = Question::find($postData['id']);
				$question->topic = $postData['topic'];
				$question->correct_answer = $postData['correct_answer'];
				$question->save();

				return Redirect::to('backends/quizz/edit/'.$question->id);
			}
		}else{
			$rules = array('topic' => 'required');
			$validator = Validator::make($postData, $rules);

			if( $validator->fails() ){ 
				return Redirect::to('backends/quizz/add')->withInput()->withErrors($validator);
			} else {
				$question = Question::create([
					'topic' => $postData['topic']
				]);
				return Redirect::to('backends/quizz/edit/'.$question->id);
			}
		}
	}
	public function getAnswer(){
		$_GET['keyword'];
		$answer = Answer::create([
			'answer_title' => $_GET['keyword'],
			'question_id' => $_GET['keyword1']
		]);
		return Redirect::to('backends/quizz/edit/'.$_GET['keyword1']);
	}

	public function getRemoveanswer(){
		$answer = Answer::find($_GET['keyword'])->delete();
		return Redirect::to('backends/quizz/edit/'.$_GET['keyword1']);
	}

	public function getEditanswer(){
		$answer = Answer::find($_GET['keyword']);
		$answer->answer_title = $_GET['keyword2'];
		$answer->save();
		return Redirect::to('backends/quizz/edit/'.$_GET['keyword1']);
	}
}

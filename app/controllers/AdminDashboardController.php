<?php
class AdminDashboardController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', ['on' => 'post']);
		date_default_timezone_set("Asia/Phnom_Penh");
	}
	public function getIndex()
	{ 
		$data['pageTitle'] = "Quizzler | Dashboard";
		$data['urlAddBack'] = "backends/dashboard";
		$questions = Question::orderBy('id', 'desc')->get();
		//Remove Question that don't have answer
		foreach ($questions as $question) {
			if(!$question->correct_answer){
				Question::where('id', $question->id)->delete();
			}
		}
		//end remove question
		$data['questions'] = Question::orderBy('id', 'desc')->get();
		
		$data['activeD'] = 'active';
		$data['viewResult'] = false;	

		if(isset($_GET['keyword']) == 'quizz'){
			
			$data['btnAddBack'] = '<i class="icon-reply"></i><span>Back<span>';
			$data['labelPage'] = "The Quizzler Result";
			
			$data['formOrigin'] = $_GET['keyword'];
			
			$total = number_format($_GET['total'], 2, '.', '');
			$total = substr($total, -2);
			if($total=="00"){
				$total = number_format($_GET['total'], 0,',','.');
			}else{
				$total = number_format($_GET['total'], 2,',','.');
			}
			
			$result = Results::find($_GET['resultId']);
			$result->score = $total;
			$result->save();
			

			if($result->score >= 50){
				$data['resultScore'] = " Your scored ".$result->score." %, You Passed.";
			}else{
				$data['resultScore'] = " Your scored ".$result->score." %, You Failed.";
			}
			$data['resultQuestionId'] = json_decode($result->question_quizzler_answer);	
			$data['resultActive'] = 1;
			if(Auth::user()->user_role_id!=2){
				$result = Results::where('user_id', Auth::user()->id)->first();
				$result = Results::find($result['id']);
				$result->active = 0;
				$result->save();
				$data['resultActive'] = $result->active;
			}

			
			return View::make('backends.dashboard.result', $data);
		}else{
			$result = Results::where('user_id', Auth::user()->id)->first();
			$result = Results::find($result['id']);	
			if(isset($result)){
				$data['viewResult'] = true;	
				if($result->active!=1){ 
					$data['urlAddBack'] = "backends";
					$data['btnAddBack'] = '<i class="icon-reply"></i><span>Back<span>';
					$data['labelPage'] = "The Quizzler Result";
					$data['formOrigin'] = 'quizz';

					$result = Results::where('user_id', Auth::user()->id)->first();
					$result = Results::find($result['id']);
					$data['resultActive'] = $result->active;

					if($result->score >= 50){
						$data['resultScore'] = " Your scored ".$result->score." %, You Passed.";
					}else{
						$data['resultScore'] = " Your scored ".$result->score." %, You Failed.";
					}
					$data['resultQuestionId'] = json_decode($result->question_quizzler_answer);	

					return View::make('backends.dashboard.result', $data);
				}else{
					$data['urlAddBack'] = "backends/quizz/add";
					$data['btnAddBack'] = '<i class="icon-plus"></i><span>Create Question<span>';
					$data['labelPage'] = "The Quizzler Challenge";
					$data['formOrigin'] = "dashboard";
					return View::make('backends.dashboard.dashboard', $data);	
				}
			}else{

				$data['urlAddBack'] = "backends/quizz/add";
				$data['btnAddBack'] = '<i class="icon-plus"></i><span>Create Question<span>';
				$data['labelPage'] = "The Quizzler Challenge";
				$data['formOrigin'] = "dashboard";
				return View::make('backends.dashboard.dashboard', $data);	
			}
		}
	}

	public function getViewresult(){
		$result = Results::where('user_id', Auth::user()->id)->first();
		$result = Results::find($result['id']);	
		$data['pageTitle'] = "Quizzler | Dashboard";
		$data['urlAddBack'] = "backends/dashboard";
		$data['btnAddBack'] = '<i class="icon-reply"></i><span>Back<span>';
		$data['labelPage'] = "The Quizzler Result";
		$data['questions'] = Question::orderBy('id', 'desc')->get();

		$data['formOrigin'] = 'quizz';
		$data['activeD'] = 'active';

		$result = Results::where('user_id', Auth::user()->id)->first();
		$result = Results::find($result['id']);
		$data['resultActive'] = $result->active;

		if($result->score >= 50){
			$data['resultScore'] = " Your scored ".$result->score." %, You Passed.";
		}else{
			$data['resultScore'] = " Your scored ".$result->score." %, You Failed.";
		}
		$data['resultQuestionId'] = json_decode($result->question_quizzler_answer);	

		return View::make('backends.dashboard.result', $data);	
	}

	public function getDeletequestion(){
		Question::find($_GET['keyword'])->delete();
		Answer::where('question_id', $_GET['keyword'])->delete();
		return Redirect::to('backends/dashboard');
	}
}

<?php
class AdminUsersController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', ['on' => 'post']);
		date_default_timezone_set("Asia/Phnom_Penh");
	}
	public function getIndex(){ 
		$data['pageTitle'] = "Quizzler | Users";
		//$data['urlAddBack'] = "backends/users/add";
		$data['urlAddBack'] = "#";
		$data['btnAddBack'] = '<i class="icon-plus"></i><span>Add<span>';
		$data['labelPage'] = "The Quizzler";

		if(isset($_GET['keyword'])){
			$userRoleId = $_GET['keyword'];
			if($_GET['keyword']!=''){
				$data['users'] = User::where('user_role_id', $userRoleId)->orderBy('created_at', 'asc')->paginate(10);		
			}else{
				$data['users'] = User::orderBy('created_at', 'asc')->paginate(10);			
			}
		}else{
			$userRoleId = 1;
			$data['users'] = User::where('user_role_id', $userRoleId)->orderBy('created_at', 'asc')->paginate(10);		
		}
		$data['userType'] = $userRoleId;

		$userRole = Userrole::orderBy('name', 'asc')->get();
		$userRoleArr = [''=>'-- All users --'];
		foreach ($userRole as $role) {
			$userRoleArr[$role->id] = $role->name;
		}
		$data['userRole'] = $userRoleArr;

		$result = Results::all();
		$resultArr = [];
		foreach($result as $rs){
			$resultArr[$rs->user_id] =$rs->user_id;
		}	
		$data['resultArr'] = $resultArr;

		$data['formOrigin'] = "users";
		$data['activeU'] = 'active';
		return View::make('backends.users.users', $data);	
	}
	public function getTestagain($userId=0){
		$result = Results::where('user_id', $userId)->first();
		$result = Results::find($result['id']); //return $result->active;
		if($result->active == 0){
			$result->active = 1;
		}elseif($result->active == 1){
			$result->active = 0;
		}
		$result->save();
		return Redirect::to('backends/users');	
	}
}

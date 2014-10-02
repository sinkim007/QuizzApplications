<?php
class LoginController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', ['on' => 'post']);
		date_default_timezone_set("Asia/Phnom_Penh");
		$this->user = new User();
	}
	public function getIndex()
	{ 
		$data['pageTitle'] = "Quizzler | Login";
		$data['loginTo'] = "Quizzler";
		return View::make('users.login', $data);
	}

	public function getLoginform(){
		return Redirect::to('/login');
	}

	public function postLoginform(){
		$postData = Input::all();
		$rules = array('username' => 'required');
		$validator = Validator::make($postData, $rules);

		if( $validator->fails() ){ 
			return Redirect::to('/login')->withInput()->withErrors($validator);
		} else {
			$credentials = array('username' => $postData['username'], 'password' => $postData['password']);
			if(Auth::attempt($credentials)){ 
				if(Auth::user()->active==1){
					if(Auth::user()->user_role_id==2){
						return Redirect::to('backends/dashboard')->with('flash_message', 'Welcome To : The Quizzler.');
						exit;
					}else{
						$results = Results::where('user_id', Auth::user()->id)->first();
						if(isset($results)){
							return Redirect::to('backends/dashboard/viewresult');
							exit;
						}else{
							return Redirect::to('backends/dashboard')->with('flash_message', 'Welcome To : The Quizzler.');
							exit;
						}
					}
				}else{
					return Redirect::to('/login')->withInput()->with('flash_message', 'Your Username and Password are Invalide.');
					exit;
				}	
			}else{ 
				return Redirect::to('/login')->withInput()->with('flash_message', 'Your Username and Password are Invalide.');
				exit;
			}
		}
	}
	public function postResetpassword(){
		return Redirect::to('/login')->withInput()->with('flash_message', 'Reset password not yet done.');
		exit;
	}
	public function postRegisterform(){
		$postData = Input::all();
		$rules = array(
						'firstname' => 'required',
						'lastname' => 'required',
						'email' => 'required',
						'address' => 'required',
						'country' => 'required',
						'username' => 'required',
						'password' => 'required',
						'rpassword' => 'required'
						);
		$validator = Validator::make($postData, $rules);

		if( $validator->fails() ){
			return Redirect::to('/login')->withInput()->withErrors($validator);
		} else { 
			$user = User::create([
				'firstname' => $postData['firstname'],
				'lastname' => $postData['lastname'],
				'email' => $postData['email'],
				'address' => $postData['address'],
				'country' => $postData['country'],
				'username' => $postData['username'],
				'password' => Hash::make($postData['password']),
				'active' => 1,
				'user_role_id' => 1
			]);
			return Redirect::to('/login')->withInput()->with('flash_message', 'Welcome new member, please try to login.');
			exit;
		}
	}

	function getLogout(){
		Session::forget('username');
		Session::forget('password');
		Auth::logout();
		return Redirect::to('/login');
	}


}
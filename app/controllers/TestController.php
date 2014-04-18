<?

class TestController extends BaseController {







//	public function showProfile($id)
	public function register(){
		//$user = User::find($id);
		//return View::make('user.profile', array('user' => $user));
	   	//return View::make('hello');
	   	//$this->layout->content = View::make('usersRegister');
		return View::make('userRegister');
	}

	public function create(){
		// I think this is going to make the user...
 		$validator = Validator::make(Input::all(), User::$rules);
		// stuck some validator in models/user. 

		if ($validator->passes()) {
			  // validation has passed, save user in DB
			 	return Redirect::to('user/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput(); 
		} else {
			  // validation has failed, display error messages   
			 return Redirect::to('user/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

		//return View::make('manageBank');
		// nope...
	



	public function listUsers(){
		$users = User::all();
		return View::make('users')->with('users', $users);
	}



}


?>

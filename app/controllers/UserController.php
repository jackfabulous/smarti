<?

class UserController extends BaseController {

/**
* Show the profile for the given user.
*/

	public function __construct() {
	   $this->beforeFilter('csrf', array('on'=>'post'));
	}

/*	public function showProfile($id){
		$user = User::find($id);
		return View::make('user.profile', array('user' => $user));
}*/

	public function register(){
		return View::make('userRegister');
	}

	public function create(){   // creates a new user
 		$validator = Validator::make(Input::all(), User::$rulesSignUp);
		// this validator is in umodels/user. 
		if ($validator->passes()) {
			    // make new user
			    $user = new User;
			    $user->name = Input::get('name');
			    $user->username = Input::get('username');
			    $user->email = Input::get('email');
			   	$user->password = Hash::make(Input::get('password'));
			   	$user->save();

				// give them a profile

 				$profile = new Profile;
			    $profile->entName = '';
				$profile->id = $user->id;
			    $profile->save();

				// give them a userInfo

 				$uInfo = new UserInfo;
			    $uInfo->bankTotal = 10;
				$uInfo->id = $user->id;
			    $uInfo->save();


			 	return Redirect::to('login')->with('message', 'Success!')->withErrors($validator)->withInput(); 
		} else {
			  // validation has failed, display error messages   
			 return Redirect::to('user/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	// probably can just move this to routes
	public function showLogin() {
		return View::make('userLogin');
	}	

	// authenticae from log in attempt
	public function authenticateUser(){
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		   return Redirect::to('manage/account')->with('message', 'You are now logged in!');
		} else {
		   return Redirect::to('login')->with('message', 'Your username/password combination was incorrect')->withInput();
		}

	}
	
	// move to routes?
	public function logout(){
		  Auth::logout();
 		  return Redirect::to('/')->with('message', 'Your are now logged out!');
	}

	// updates a user's basic info
	public function userUpdate(){  
		$rulesUpdate = array(
	   		'name'		=>'required|min:2',
	   		'username'	=>'required|alpha|min:2|unique:users,username,'.Auth::user()->id,
	   		'email'		=>'required|email|unique:users,email,'.Auth::user()->id
	   );
	
 		$validator = Validator::make(Input::all(), $rulesUpdate);
		if ($validator->passes()) {
			  	// validation has passed, save user in DB
				$user=User::find(Auth::user()->id);
				$user->name = Input::get('name');
			   	$user->username = Input::get('username');
			   	$user->email = Input::get('email');
			   	$user->save();

				return Redirect::to('user/update');
			 
		} else {
			  // validation has failed, display error messages   
			 return Redirect::to('user/update')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	
	}



}

?>

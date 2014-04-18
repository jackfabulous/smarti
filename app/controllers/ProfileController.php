<?

class ProfileController extends BaseController {


	public function __construct() {
	   $this->beforeFilter('csrf', array('on'=>'post'));
	}


	public function updateProfile(){
	
	
	$rulesUpdate = array(
	   		'entName'	=>'required|min:2',
	   		'gender'	=>'in:female,male',
	   		'height'	=>'numeric',
			'weight'	=>'numeric',
			'hair'	=>'in:blond,brunette,black,red',
			'height'	=>'numeric',
			'phone'	=>'',
			'email'	=>'email',
			'website'	=>'URL',
			'facebook'	=>'URL',
			'twitter'	=>'URL',
			'tumblr'	=>'URL'

	   );
	
 		$validator = Validator::make(Input::all(), $rulesUpdate);
		if ($validator->passes()) {
			  	// validation has passed, save user in DB
				$profile=Profile::find(Auth::user()->id);

				$profile->entName 	= Input::get('entName');
				$profile->gender 	= Input::get('gender');
				$profile->height 	= Input::get('height');
				$profile->weight 	= Input::get('weight');
				$profile->hair 		= Input::get('hair');
				$profile->phone 	= Input::get('phone');
				$profile->email 	= Input::get('email');
				$profile->website 	= Input::get('website');
				$profile->facebook 	= Input::get('facebook');
				$profile->twitter 	= Input::get('twitter');
				$profile->tumblr 	= Input::get('tumblr');

			   	$profile->save();

				return Redirect::to('/manage/account');
			 
		} else {
			  // validation has failed, display error messages   
			 return Redirect::to('user/update')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}




}

?>

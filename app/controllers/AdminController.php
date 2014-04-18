<?

class AdminController extends BaseController {

	public function __construct() {
	   $this->beforeFilter('csrf', array('on'=>'post'));
	}


	public function listUsers(){
		$users = User::all();
		return View::make('adminUsers')->with('users', $users);
	}



}


?>

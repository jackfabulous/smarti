<?

class bankController extends BaseController {


	public function __construct() {
	   $this->beforeFilter('csrf', array('on'=>'post'));
	}


	public function addToBank($addAmount){
	
		$userInfo = UserInfo::find(Auth::user()->id);

		$userInfo->bankTotal 	= $userInfo->bankTotal+$addAmount;
	  	$userInfo->save();

		return Redirect::to('/manage/bank')->with('message', $addAmount+' has been added to your account');
			 
	}


}

?>

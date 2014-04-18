<?

class AdController extends BaseController {


	public function __construct() {
	   $this->beforeFilter('csrf', array('on'=>'post'));
	}


	public function createAd(){
	
		$rulesAd = array(
	   		'headline'	=>'required|min:2',
	   		'blurb'		=>'',
	   		'photoid'	=>'required',
	   		'start'		=>'date|required',
			'end'		=>'date|required',
			'size'		=>'in:mini,standard,large,mega|required'
	   );

 		$validator = Validator::make(Input::all(), $rulesAd);
		if ($validator->passes()) {

			  	// validation has passed, save ad in DB
	    		$ad = new Ad;

				$ad->uid 	= Auth::user()->id;
//$dt->toDateTimeString();
				$ad->headline 	= Input::get('headline');
				$ad->blurb 	= Input::get('blurb');
				$ad->photoid 	= Input::get('photoid');
				$ad->start 		= date ("Y-m-d H:i:s", strtotime(Input::get('start')));
				$ad->end	 	= date ("Y-m-d H:i:s", strtotime(Input::get('end')));
				$ad->size 		= Input::get('size');

			   	$ad->save();

				return Redirect::to('/manage/ads')->with('message', 'Your ad was successfully created.');
			 
		} else {


			return Redirect::to('/manage/ads/create')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}



	public function editAd(){
	
		$rulesAd = array(
	   		'headline'	=>'required|min:2',
	   		'blurb'		=>'',
	   		'photoid'	=>'required',
	   		'start'		=>'date|required',
			'end'		=>'date|required',
			'size'		=>'in:mini,standard,large,mega|required'
	   );

 		$validator = Validator::make(Input::all(), $rulesAd);
		if ($validator->passes()) {
			  	// validation has passed, update DB
				$ad=Ad::find(Input::get('adId'));

				$ad->headline 	= Input::get('headline');
				$ad->blurb 	= Input::get('blurb');
				$ad->photoid 	= Input::get('photoid');
				$ad->start 		= date ("Y-m-d H:i:s", strtotime(Input::get('start')));
				$ad->end	 	= date ("Y-m-d H:i:s", strtotime(Input::get('end')));
				$ad->size 		= Input::get('size');

			   	$ad->save();

				return Redirect::to('/manage/ads')->with('message', 'The ad was successfully updated');
			 
		} else {
			// validation has failed, display error messages   

			return Redirect::to('/manage/ads')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	public function deleteAd($adId){
		$ad=Ad::find($adId);
		$ad->delete();
		return Redirect::to('/manage/ads')->with('message', 'The ad has been deleted');
	}

}

?>

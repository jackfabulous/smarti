<?

class PquestionController extends BaseController {

	public function __construct() {
	   $this->beforeFilter('csrf', array('on'=>'post'));
	}


	public function createNewQuestion(){

		$rulesAd = array(
	   		'question'	=>'required|min:5',
	   		'prompt'	=>'required|min:5',
			'active'	=>'boolean'
	   );

 		$validator = Validator::make(Input::all(), $rulesAd);
		if ($validator->passes()) {

			  	// validation has passed, save ad in DB
	    		$theQ = new Pquestion;

				$theQ->uid 	= Auth::user()->id;
				$theQ->question = Input::get('question');
				$theQ->prompt 	= Input::get('prompt');
				//$theQ->active 	= Input::get('active');

			   	$theQ->save();

				return Redirect::to('/admin/questions')->with('message', 'The new question successfully created.');
		} else {
			return Redirect::to('/admin/questions/create')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}


	public function editQuestion($id){

		$rulesAd = array(
	   		'question'	=>'required|min:5',
	   		'prompt'	=>'required|min:5',
			'active'	=>'boolean'
	   );

 		$validator = Validator::make(Input::all(), $rulesAd);
		if ($validator->passes()) {
			  	// validation has passed, update DB
				$theQ=Pquestion::find($id);

				$theQ->question = Input::get('question');
				$theQ->prompt 	= Input::get('prompt');
				//$theQ->active 	= Input::get('active');

			   	$theQ->save();

				return Redirect::to('/admin/questions')->with('message', 'The question was successfully updated');
			 
		} else {
			// validation has failed, display error messages   

			return Redirect::to('/admin/questions/editq')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}


	public function answerQuestion($qid){
		$rulesAd = array(
	   		'question'	=>'',
	   		'answer'	=>'required|min:5',
			'active'	=>'boolean',
			'photoid'	=>''

	   );
 		$validator = Validator::make(Input::all(), $rulesAd);
		if ($validator->passes()) {
			  	// validation has passed, update DB				
				
				$updateOrNo = DB::table('panswers')->where('uid', '=', Auth::user()->id)->where('qid','=',$qid)->count();

				if ($updateOrNo==0){
					$theA = new Panswer;

					$theA->uid 		= Auth::user()->id;
					$theA->qid 		= $qid;
					$theA->answer 	= Input::get('answer');
					$theA->photoid 	= Input::get('photoid');

				   	$theA->save();

				}else{
					$answer = DB::table('panswers')->where('uid', '=', Auth::user()->id)->where('qid','=',$qid)->first();
					$aid=$answer->id;
					$theA=Panswer::find($aid);

					$theA->uid 		= Auth::user()->id;
					$theA->qid 		= $qid;
					$theA->answer 	= Input::get('answer');
					$theA->photoid 	= Input::get('photoid');

				   	$theA->save();

				}



				return Redirect::to('/manage/profile/questions')->with('message', 'Your answer was saved');
		} else {
			// validation has failed, display error messages   
			return Redirect::to('/manage/profile/questions')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	public function editAnswer($aid){
		$rulesAd = array(
	   		'question'	=>'',
	   		'answer'	=>'required|min:5',
			'active'	=>'boolean'
	   );
 		$validator = Validator::make(Input::all(), $rulesAd);
		if ($validator->passes()) {
			  	// validation has passed, update DB				
				
				$theA = Pquestion::find($aid);

				$theA->answer 	= Input::get('answer');

			   	$theA->save();

				return Redirect::to('/manage/profile/questions')->with('message', 'Your answer was saved');
		} else {
			// validation has failed, display error messages   
			return Redirect::to('/manage/profile/questions')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}





}


?>

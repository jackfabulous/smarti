<?

class PhotoController extends BaseController {


	public function __construct() {
	   	$this->beforeFilter('csrf', array('on'=>'post'));
	}

	/*
	public function UploadPhoto(){
		$photo = new Photo;
		$photo->uid 	= Auth::user()->id;
	   	$photo->save();
		return Redirect::to('/manage/photos')->with('message', 'The photo was successfully uploaded');;
	}
	*/

	public function uploadPhoto() {
		$file = Input::file('image');
		$input = array('image' => $file);
		$rules = array(
			'image' => 'image'
		);
		$validator = Validator::make($input, $rules);
		if ( $validator->fails() )
		{
			//return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
			return Redirect::to('/manage/photos')->with('message', 'The shit was hosed, bro');;
		} else {
			$destinationPath = 'profileimages';
			//$filename = $file->getClientOriginalName();
			$filename = uniqid('', true).'.jpg';	
			Input::file('image')->move($destinationPath, $filename);

			$photo 			 	= new Photo;
			$photo->uid 	 	= Auth::user()->id;
			$photo->filename 	= $filename;

		   	$photo->save();

			return Redirect::to('/manage/photos')->with('message', 'The photo was successfully uploaded');;
//			return Response::json(['success' => true, 'file' => asset($destinationPath.$filename)]);
		}
	}




	public function deletePhoto($photoId){
		$photo=Photo::find($photoId);
		$photo->delete();
		return Redirect::to('/manage/photos')->with('message', 'The photo has been deleted');
	}

	public function activatePhoto($photoId){
		$photo=Photo::find($photoId);
		$photo->active=true;
		$photo->save();
		return Redirect::to('/manage/photos')->with('message', 'The photo has been activated');
	}

	public function deActivatePhoto($photoId){
		$photo=Photo::find($photoId);
		$photo->active=false;
		$photo->save();		
		return Redirect::to('/manage/photos')->with('message', 'The photo has been deactivated');
	}






}

?>

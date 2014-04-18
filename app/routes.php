<?
/*------------ 
/	tests
/	routes to not be used and also to be removed later
*/
Route::get('/test', 'HomeController@showWelcome');

Route::get('/test/form', function(){
	return View::make('testForm');	
});

Route::post('/test/submitForm', function(){
	return View::make('testFormSubmit');	
});

Route::get ('/test/register', 	'TestController@register');
Route::get ('/test/list',	 	'TestController@listUsers');
Route::get ('/test/create', 	'TestController@create');

/*------------ 
/	root
*/
Route::get('/', function()
{
	return View::make('profileBrowse');
});


/*------------ 
/	user 
*/


Route::get ('/user/register', 		'UserController@register');
Route::post('/user/create', 		'UserController@create');     	// process registration

Route::get ('/login',		 		'UserController@showLogin');
Route::post('/user/authenticate',	'UserController@authenticateUser');	// process login

Route::get ('/user/logout',	 		'UserController@logout');

Route::get ('/user/update', 		 function(){   	return View::make('userUpdate');	});
Route::post ('/user/makeUpdate', 	'UserController@userUpdate');   	// procerss updated user information



/*------------ 
/	admin 
*/

Route::get ('/admin/users',	 		'AdminController@listUsers');





Route::get ('/admin/questions', array('before' => 'auth', function(){
    return View::make('adminPquestions');
}));

Route::get ('/admin/questions/create', array('before' => 'auth', function(){
    return View::make('adminPquestionsCreate');
}));




Route::post ('/admin/questions/create/newq',	 		'PquestionController@createNewQuestion');

Route::get ('/admin/questions/edit/{id}', array('before' => 'auth', function($id){
    return View::make('adminPquestionsEdit')->with('id',$id);;
}));

Route::post ('/admin/questions/doedit/{id}',	 		'PquestionController@editQuestion');





/*--------- 
/	profiles
*/
Route::get('profile/{id}', function($id)
{
    return View::make('profile')->with('id',$id);
});


/*--------- 
/	account management
*/


Route::get('manage/account', array('before' => 'auth', function()
{
    return View::make('manage');
}));


Route::get('manage/profile/questions', array('before' => 'auth', function()
{
    return View::make('manageProfileQuestions');
}));

Route::post ('/manage/profile/questions/answer/{id}',	 		'PquestionController@answerQuestion');


/*
Route::get ('//manage/profile/questions/answer/edit/{id}', array('before' => 'auth', function($id){
    return View::make('manageProfileQuestionsEdit')->with('id',$id);;
}));
*/
//Route::post ('/admin/questions/doedit/{id}',	 		'PquestionController@editQuestion');





Route::get('manage/profile/info', array('before' => 'auth',  function()
{
    return View::make('manageProfileInfo');
}));

Route::post('/manage/profileUpdate',	'ProfileController@updateProfile');	// process login






Route::get('manage/ads', array('before' => 'auth', function()
{
    return View::make('manageAd');
}));

Route::get('manage/ads/edit/{adId}', array('before' => 'auth',  function($adId)
{
    return View::make('manageAdEdit')->with('adId',$adId);
}));

Route::get('manage/ads/create', array('before' => 'auth',  function()
{
    return View::make('manageAdCreate');
}));

Route::post('/manage/ads/createNewAd',	'AdController@createAd');	// process create new ad
Route::post('/manage/ads/editExistingAd',	'AdController@editAd');	// process edit ad
Route::get('/manage/ads/delete/{adId}',	'AdController@deleteAd');	// delete ad (front end is embedded in ad page)





Route::get('manage/photos', array('before' => 'auth', function()
{
    return View::make('managePhoto');
}));

Route::post('/manage/photos/upload',				'PhotoController@uploadPhoto');	// Upload photo
Route::get('/manage/photos/delete/{photoId}',		'PhotoController@deletePhoto');	// delete photo (front end is standard file picker)
Route::get('/manage/photos/activate/{photoId}',		'PhotoController@activatePhoto');	// activate photo 
Route::get('/manage/photos/deactivate/{photoId}',	'PhotoController@deActivatePhoto');	// deactivate photo


Route::get('manage/bank', array('before' => 'auth', function()
{
    return View::make('manageBank');
}));

Route::get('manage/bank/add/{addAmount}', 	'BankController@addToBank');









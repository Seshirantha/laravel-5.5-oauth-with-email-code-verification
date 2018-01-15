<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');

/*header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods:*');*/
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', ['uses' =>'API\PassportController@login', 'as' => 'auth.login']);
Route::post('register', 'API\PassportController@register');
Route::post('logout', 'API\PassportController@logout');

Route::group(['middleware'=>'auth:api'], function(){

	Route::post('get-details', 'API\PassportController@getDetails');
	Route::post('verify', 'API\PassportController@verifyUser');
	

});



/*Route::get('user/activation/{token}', 'API\PassportController@userActivation');*/
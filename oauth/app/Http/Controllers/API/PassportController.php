<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use Mail;
use Illuminate\Support\Facades\Session;


/**
* 
*/
class PassportController extends Controller
{
	public $successStatus = 200;

	/**
	* login api
	* @return \Illuminate\Http\Response
	*/
	public function login(Request $request){

		$validator = Validator::make($request->all(),[
			'email' => 'required|email',
			'password' => 'required',
			
		]);


		if($validator->fails()){
			return response()->json($validator->errors(),	400);
		}



		if(Auth::attempt(['email' => request('email'), 'password'
			=> request('password'), 'is_activated'=>1])){
			$user = Auth::user();
			$success['token'] = $user->createToken('oauth')->
			accessToken;
			return response()->json(['success' => $success], $this
				->successStatus);

			/*return redirect()->to('http://localhost/OAuth/front/frontend/')->with('Success', "We sent activation code, please check your email");*/

		}else{

			return response()->json(['error' => 'Unauthorised credentials. Try again'], 401);
		}
		
	}

	


	/**
	* Register api
	*
	* @return \Illuminate\Http\Response
	*/
	public function register(Request $request){
		$validator = Validator::make($request->all(),[
			'name'=> 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required',
			'confirm_password' => 'required|same:password',
		]);

		//Validate inputs
		if($validator->fails()){
			return response()->json($validator->errors(),	400);
		}

		//get request details
		$input = $request->all();

		//encrypt passwod
		$input['password'] = bcrypt($input['password']);
	
		//Create user and get details
		$user = User::create($input);
	
		//Assign a token into response for creaate user
		$success['token'] = $user->createToken('oauth')->accessToken;
		//get id into response for creaate user
		$success['id'] = $user->id;
		//Assign name into response for creaate user
		$success['name'] = $user->name;

		//Create random strings for email
		$user['code'] =  str_random(4);

		DB::table('users_activation')->insert(['id_user' => $user['id'], 'code' => $user['code']]);


		Mail::send('emails.activation', $user->toArray(), function($message) use ($user){
			$message->to($user['email']);
			$message->subject('RMSMB Net - Activation code');
		});


		/*return response()->json(['success'=>$success], $this->
			successStatus);*/

		return response()->json(['success'=>$success], $this->
			successStatus);
		
		/*return redirect()->to('http://localhost/OAuth/front/frontend/')->with('Success', "We sent activation code, please check your email");*/
		
		//return redirect()->to('/OAuth/front/frontend/')->with('Success', "We sent activation code, please check your email");


		/*OAuth\front\frontend\views\pages\home.php*/

	}




	/**
	* details api
	*
	* @return \Illuminate\Http\Response
	*/
	public function getDetails(){
		
		$user = Auth::user();

		return response()->json(['success'=> $user], $this->
			successStatus);
	}

	//This can be used to verify user by clicking on email link
	/*public function userActivation($token){
		$check = DB::table('users_activation')->where('token', $token)->first();
		if(!is_null($check)){

			$user = User::find($check->id_user);
			if($user->is_activated == 1){
				return redirect()->to('login')->with('Success', "User are already activeded");
			}

			$user->update(['is_activated'=>1]);
			DB::table('users_activation')->where('token', $token)->delete();
			return redirect()->to('login')->with('Success', "user Active successfully");
			
		}

		return redirect()->to('login')->with('warning', "Your token is invalid");
	}*///


	//Verify user by code
	public function verifyUser(Request $request){
		$code = $request->code;
		$user_id = $request->id;
		
		$check = DB::table('users_activation')->where('id_user', $user_id)->first();
		
		if(!is_null($check)){

			if($code == $check->code ){

				$user = User::find($check->id_user);

				if($user->is_activated == 1){
					
					return response()->json(['message'=> 'in side if.You already activated. Please login.'], $this->
					successStatus);
				}else{

					$user->update(['is_activated'=>1]);

					DB::table('users_activation')->where('code', $code)->delete();

					return response()->json(['user_data'=> $user], $this->
					successStatus);
				}
			}else{
				return response()->json(['message'=>'Invalid code.'], $this->
				successStatus);
			}
		}else{
			return response()->json(['message'=>'In out.You are already activated. Please login.']);
		}

		
	}


	/**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard(){
        return Auth::guard('api');
    }

    public function logout(Request $request)
    {

        if (!$this->guard()->check()) {
            return response()->json([
                'message' => 'No active user session was found'
            ], 404);
        }

        // Taken from: https://laracasts.com/discuss/channels/laravel/laravel-53-passport-password-grant-logout
        $request->user('api')->token()->revoke();

        Auth::guard()->logout();

        Session::flush();

        Session::regenerate();

        return response()->json([
            'message' => 'User was logged out'
        ]);
    }


	
}


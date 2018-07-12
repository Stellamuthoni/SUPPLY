<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Input;
use Validator;
use Redirect;
use Hash;
use Mail;
use URL;
use Auth;
use App\User;

class AccountController extends BaseController{

  	public function getCreate(){
 	return View ('account.create');
	}

	public function postCreate(){
		$messages = ['password.regex' => "Your password must contain at least 6 characters"];
		$validator = Validator::make(Input::all(),
			array(
			'email' 			=> 'required|max:50|email|unique:users',
			'username' 			=> 'required|max:20|min:3|unique:users|alpha_dash',
			'password' 			=> 'required|min:6',
			'password_again' 	=> 'required|same:password'

			)
		);

		if($validator->fails()){
			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput()
					->with($messages);
    }else{
			$email 		= Input::get('email');
			$username 	= Input::get('username');
			$password 	= Input::get('password');

			//Activation code
			$code		= str_random(60);
			$user 	= User::create(array(
				'email'		=> $email,
				'username'	=> $username,
				'password'	=> Hash::make($password),
				'code'		=> $code
			));

			if($user){


			$beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
		    $beautymail->send('emails.activate', ['link' => URL::route('account-activate', $code), 'username' => $username], function($message) use ($user)
		    {
		        $message
					->from('benjamindev13@gmail.com')
					->to($user->email, $user->username)
					->subject('Activate your account!');
		    });

				flash('Your account has been created! We have sent you an email to activate it.')->success();
				return Redirect::route('login');
			}

		}
	}

	public function getActivate($code){
	$user = User::where('code', '=', $code)->where('active','=', 0);

	if($user->count()) {
		$user = $user->first();

		//Update user to active state
		$user->active 	=1;
		$user->code 	='';

		if($user->save()) {
			flash('Activated! You can now sign in!')->info();
			return Redirect::route('home');
		}

	}
	flash('We could not activate your account. Try again later.')->error();
	return Redirect::route('home');

	}

	public function getSignOut() {
	Auth::logout();
	flash('Successfully Logged Out')->info();
	return Redirect::route('home');
	}

	public function postSignIn(){
		$validator = Validator::make(Input::all(),
			array(
				'email'		=>'required|email',
				'password'	=>'required'
			)
		);

		if($validator->fails()){
			//Redirect to the sign in page
			return Redirect::route('login')
					->withErrors($validator)
					->withInput();
		} else {

			$remember = (Input::has('remember')) ? true : false;

			//Attempt user sign in
			$auth = Auth::attempt(array(
				'email'		=> Input::get('email'),
				'password'	=> Input::get('password'),
				'active'	=> 1
				), $remember);

			if($auth) {

				//Redirect to the intended page
				return Redirect::intended('/');
			} else {
				flash('Email/Password wrong, or account is not activated')->error();
				return Redirect::route('login');

			}
		}
		flash('There was a problem signing you in. Have you activated?')->error();
		return Redirect::route('login');

	}
}

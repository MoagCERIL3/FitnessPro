<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UtilisateursLoginController extends Controller
{
    public function _construct(){

    	$this->middlware('guest:Utilisateurs');
    
    }
    
    public function showLoginForm(){
    	
    	return view('auth.ServiceLogin');
    }

    public function login(Request $request){

    	// Validate the form data 
    	$this->validate($request, [

    		'email' =>'required|email',
    		'password' => 'required|min:6'


    	]);

    	//Attempt to log the user in
    	

    	if (Auth::guard('Utilisateurs')->attempt(['email' => $request->email, 'password' => $request->password], 
    		$request->remember)) {
    		//if successful, the redirect to their intended location
    		return redirect()->intended(route('Invite'));
    	}
    	



    	

    	//if unsuccessful, then redirect back to the login with the form data 
    	return redirect()->back()->withInput($request->only('email','remember'));  
    }
    public function credentials ($request)
    {
      $request['is_activated']=1;
      return $request->only('email', 'password','is_activated');
    }
}

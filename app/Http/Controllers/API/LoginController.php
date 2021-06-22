<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utilisateurs;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller

{

	use IssueTokenTrait;

    	private $Client;


	public function __construct(){

    		$this->Client = Client::find(6);
    	}

    public function login(Request $request){

    	$this->validate($request, [

    		'email'=> 'required',
    		'password' =>'required'



    	]);

    	return $this->issueToken($request, 'password'); 

    	

    	//dd($request->only('email', 'password'));



    }

    public function refresh(Request $request){

    	$this->validate($request, [

    		'refresh_token'=> 'required'


    	]);

    	    	return $this->issueToken($request, 'refresh_token'); 




    }

    public function logout(Request $request){

    	$accessToken = Auth::user()->token();

    	DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked' => true]);
    	$accessToken->revoke();
    	return response()->json([], 200);


    }
}

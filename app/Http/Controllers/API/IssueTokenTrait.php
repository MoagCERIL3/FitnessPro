<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


trait IssueTokenTrait {

    public function issueToken(Request $request, $grantType, $scope="*"){


    		$form_params = [
	        'grant_type' => $grantType,
	        'client_id' => $this->Client->id,
	        'client_secret' => $this->Client->secret,
	        'username' => $request->email, 
	        'scope'=>$scope
    	];

    	############ Dispatch du requete

    	$request->request->add($form_params);

    	$proxy = Request::create('oauth/token','POST');

    	return Route::dispatch($proxy);








    }



}








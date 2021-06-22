<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utilisateurs;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{
    use IssueTokenTrait;
	private $Client;

	public function __construct(){

    		$this->Client = Client::find(6);
    	}

    public function register(Request $request){

    	


   		################# Validation
    	$this->validate($request,[

    		'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Sexe' => 'required|in:masculin,feminin',
            'Age' => 'required|integer|max:25',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'Poids' => 'required|integer|min:35'	

    	]);
 		
 		############# Ajout
    	$user = Utilisateurs::create([
            'Nom' => request('Nom'),
            'Prenom' => request('Prenom'),
            'Sexe' => request('Sexe'),
            'Age' => request('Age'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'Poids' => request('Poids')
        ]);


    	############## 	
       // $response = $http->post('http://your-app.com/oauth/token', [
       	/*$form_params = [
	        'grant_type' => 'password',
	        'client_id' => $this->Client->id,
	        'client_secret' => $this->Client->secret,
	        'username' => request('email'),
	        'password' => request('password'),
	        'scope'=>'*'
    	];

    	############ Dispatch du requete

    	$request->request->add($form_params);

    	$proxy = Request::create('oauth/token','POST');

    	return Route::dispatch($proxy);*/

    	return $this->issueToken($request, 'password'); 






    	//dd($Request->all());
    }
}

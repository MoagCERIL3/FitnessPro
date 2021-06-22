<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilisateurs;
use Auth;
use Mail;


class UtilisateursRegisterController extends Controller
{
	   public function __construct()
    {
        $this->middleware('guest:Utilisateurs');
    }

    public function Reg()
    {
        return view('auth.InscriptionUtilisateur');
    }

    public function create(){
    	//Validate
    	 $this->validate(request(), [

            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Sexe' => 'required|in:masculin,feminin',
            'Age' => 'required|integer|max:25',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',



    	 ]);
    	 //Create
    	  $user = Utilisateurs::create(request(['Nom','Prenom','Sexe','Age','email','password' ]));



    	 //Redirect
    	 return redirect()->to('Invite');
}









    

}

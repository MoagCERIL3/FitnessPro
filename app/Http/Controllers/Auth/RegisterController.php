<?php

namespace App\Http\Controllers\Auth;

use App\Utilisateurs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Mail;
use DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Invite';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:Utilisateurs');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Sexe' => 'required|in:masculin,feminin',
            'Age' => 'required|integer|max:25',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',



        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Utilisateurs::create([
            'Nom' => $data['Nom'],
            'Prenom' => $data['Prenom'],
            'Sexe' => $data['Sexe'],
            'Age' => $data['Age'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);
    }
    public function register(Request $request) {
     $input = $request->all();
     $validator = $this->validator($input);

     if ($validator->passes()){
       $user = $this->create($input)->toArray();
       $user['link'] = str_random(30);

       DB::table('uactivation')->insert(['id_utilisateur'=>$user['id'],'token'=>$user['link']]);

       Mail::send('Utilisateursactivation', $user, function($message) use ($user){
         $message->to($user['email']);
         $message->subject('www.fitnesspro.com - Activation Code');
       });
       return redirect()->to('Invite/ServiceLogin')->with('success',"We sent activation code. Please check your mail.");
     }
     return back()->with('errors',$validator->errors());
   }

   public function userActivation($token){
     $check = DB::table('uactivation')->where('token',$token)->first();
     if(!is_null($check)){
       $user = Utilisateurs::find($check->id_user);
       if ($user->is_activated ==1){
         return redirect()->to('Invite/ServiceLogin')->with('success',"user are already actived.");

       }
       $user->update(['is_activated' => 1]);
       DB::table('uactivation')->where('token',$token)->delete();
       return redirect()->to('Invite/ServiceLogin')->with('success',"user active successfully.");
     }
     return redirect()->to('Invite/ServiceLogin')->with('Warning',"your token is invalid");
   }

   
    public function Reg()
    {
        return view('register');
    }
}

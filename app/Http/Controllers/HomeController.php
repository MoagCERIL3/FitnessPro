<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
     public function gestcp()
    {
        return view('GestionComptes');
    }
    public function getData()
    {
         $users = DB::table('utilisateurs')->get();

        return view('home.gestcp', ['utilisateurs' => $users]);
    }
}

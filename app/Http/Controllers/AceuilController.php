<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AceuilController extends Controller
{
    public function Aceuil()
    {
    	return view('Aceuil');
    }
}

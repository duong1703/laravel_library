<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntroController extends Controller
{
    public function info_user(){
        return view('client/pages/intro/info');
    }

    public function structure_user(){
        return view('client/pages/intro/structure');
    }
}

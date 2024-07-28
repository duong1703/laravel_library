<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function user_home(Request $request){
        $book = DB::table('book')->limit(4)->get();
        return view('client/pages/home', ['data' => $book]);
    }
}

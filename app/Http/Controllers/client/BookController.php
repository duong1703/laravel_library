<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function user_book(){
        $books = DB::table('book')->paginate(6);
        return view('client/pages/book', compact('books'));
    }
}

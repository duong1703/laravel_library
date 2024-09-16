<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function user_home(Request $request)
    {

        $book = DB::table('book')->limit(4)->get();
        $top_readbook = DB::table('readbook')
            ->join('book', 'readbook.book_id', '=', 'book.id')
            ->select('book.id', 'book.book_name', 'book.book_author', 'book.book_images', 'book.created_at', 'readbook.read_count')
            ->orderByDesc('readbook.read_count')
            ->limit(6)
            ->get();
        // dd($top_readbook);
        return view('client/pages/home', ['data' => $book, 'data1' => $top_readbook]);
    }
}

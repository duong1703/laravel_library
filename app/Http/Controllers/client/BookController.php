<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\book;
use App\Models\admin\categories;
use App\Models\admin\readbook;
use App\Models\admin\subcategories;
use DB;
use Illuminate\Http\Request;
use Session;

class BookController extends Controller
{
    public function user_book()
    {
        $books = DB::table('book')->paginate(6);
        $categories = DB::table('categories')->get();
        return view('client/pages/book', compact('books', 'categories'));
    }

    public function searchBook(Request $request)
    {
        // $dataBook = book::where('book_name', 'like', "%$request->search%")->get();
        // return $dataBook;
        $searchTerm = $request->input('search');
        
        $dataBook = book::where('book_name', 'like', "%$searchTerm%")->paginate(6);
       
        return view('client/pages/book', ['books' => $dataBook, 'search' => $searchTerm]);
    }
}

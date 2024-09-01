<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\book;
use App\Models\admin\categories;
use App\Models\admin\readbook;
use App\Models\admin\subcategories;
use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class BookController extends Controller
{
    public function user_book()
    {
        $books = book::paginate(6);
        $categories = book::select('book_category', DB::raw('count(*) as book_count'))
            ->groupBy('book_category')
            ->get();

        return view('client/pages/book', compact('books', 'categories'));
    }

    public function searchBook(Request $request)
    {
        $searchTerm = $request->input('search');


        $dataBook = book::where('book_category', 'like', "%$searchTerm%")->paginate(6);
        $categories = book::select('book_category', DB::raw('count(*) as book_count'))
            ->groupBy('book_category')
            ->get();

        return view('client/pages/book', [
            'books' => $dataBook,
            'search' => $searchTerm,
            'categories' => $categories,
        ]);
    }

}

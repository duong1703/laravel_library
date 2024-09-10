<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\book;
use DB;
use Illuminate\Http\Request;

class BookDetailController extends Controller
{
    public function user_bookdetail($id){
        $bookdetail = book::findOrFail($id);
        return view('client/pages/bookdetail', compact('bookdetail'));
    }

    public function showbook($book_file_name)
    {
        $path = public_path('book/' . $book_file_name);

        

        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);
        $type = mime_content_type($path);

        return response($file, 200)->header("Content-Type", $type);
    }
}

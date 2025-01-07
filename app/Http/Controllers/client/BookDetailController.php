<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\book;
use App\Models\admin\comment;
use DB;
use Illuminate\Http\Request;

class BookDetailController extends Controller
{
    public function user_bookdetail($id)
    {
        $bookdetail = book::findOrFail($id);
        $comments = Comment::where('book_id', $id)
        ->with('member') 
        ->latest() 
        ->paginate(3);
        return view('client/pages/bookdetail', compact('bookdetail', 'comments'));
    }

    public function showbook($book_file_name)
    {
        $path = public_path('book/' . $book_file_name);

        // Kiểm tra xem file có tồn tại không
        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
        ]);
    }

}

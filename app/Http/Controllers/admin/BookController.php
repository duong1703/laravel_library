<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function book_admin(){
        return view('/admin/pages/book/list');
    }

    public function addBook(){
        return view('/admin/pages/book/add');
    }

    public function bookpost(Request $request){
        $request->validate([
            'book_images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'book_name' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'book_file' => 'required|mimes:pdf|max:2048',
            'book_publisher' => 'required|string|max:255',
            'book_year_of_manufacture' => 'required|integer',
            'book_amount' => 'required|integer',
            'book_category' => 'required|string|max:255',
            'book_status' => 'required|string|max:255',
        ]);

        $book = new book();

        if ($request->hasFile('book_images')) {
            $imagePath = $request->file('book_images')->store('book_images', 'public');
            $book->book_images = $imagePath;
        }

        if ($request->hasFile('book_file')) {
            $filePath = $request->file('book_file')->store('book_files', 'public');
            $book->book_file = $filePath;
        }

        $book -> book_name = $request -> input('book_name');
        $book -> book_author = $request -> input('book_author');
        $book -> book_publisher = $request -> input('book_publisher');
        $book -> book_year_of_manufacture = $request -> input('book_year_of_manufacture');
        $book -> book_amount = $request -> input('book_amount');
        $book -> book_category = $request -> input('book_category');
        $book -> book_status = $request -> input('book_status');

        $book -> save();

        $request->session()->flash('success', 'Thêm sách thành công!');
        return redirect()->route('bookadd');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\book;
use App\Models\admin\categories;
use App\Models\admin\subcategories;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class BookController extends Controller
{
    public function book_admin()
    {
        $book = book::with('admin')->get();
        return view('/admin/pages/book/list', ['data' => $book]);
    }

    public function addBook()
    {
        $subcategories  = DB::table('subcategories')->get();
        return view('/admin/pages/book/add', compact('subcategories'));
    }

    public function bookpost(Request $request)
    {
        $admin_id = Auth::id();
        $subcategories = subcategories::all();
        $book_categories = categories::all();

        $request->validate([
            'book_images' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'book_name' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'book_file' => 'required|file|mimes:doc,docx,pdf|max:512000',
            'book_publisher' => 'required|string|max:255',
            'book_year_of_manufacture' => 'required',
            'book_amount' => 'required|integer',
            'book_category' => 'string|max:255',
            'sub_categories_id' => 'required',
            'book_status' => 'required|string|max:255',
        ]);

        $book = new Book();

        if ($request->hasFile('book_images')) {
            $book_images = $request->file('book_images');
            $book_images_name = time() . '.' . $book_images->getClientOriginalExtension();
            $book_images->move(public_path('images'), $book_images_name);
            $book->book_images = 'images/' . $book_images_name;
        }

        if ($request->hasFile('book_file')) {
            $book_file = $request->file('book_file');
            $book_file_name = time() . '.' . $book_file->getClientOriginalExtension();
            $book_file->move(public_path('book'), $book_file_name);
            $book->book_file = 'book/' . $book_file_name;
        }

        // Lưu thông tin cơ bản của sách
        $book->admin_id = $admin_id;

        // Lấy thông tin danh mục con
        $subcategory = subcategories::find($request->input('sub_categories_id'));
        if ($subcategory) {
            // Lưu id và tên danh mục con vào cột `sub_categories_id`
            $book->sub_categories_id = $subcategory->id;  // Lưu id
            $book->book_category = $subcategory->name;  // Lưu tên danh mục con vào cột `book_category`
        } else {
            $book->sub_categories_id = null;
            $book->book_category = null;
        }

        $book->book_name = $request->input('book_name');
        $book->book_author = $request->input('book_author');
        $book->book_publisher = $request->input('book_publisher');
        $book->book_year_of_manufacture = $request->input('book_year_of_manufacture');
        $book->book_amount = $request->input('book_amount');
        $book->book_status = $request->input('book_status');

        $book->save();

        $request->session()->flash('success', 'Thêm sách thành công!');
        return redirect()->route('bookadd');
    }



    public function editBook($id)
    {
        $editBook = book::findOrFail($id);
        return view('/admin/pages/book/edit', compact('editBook'));
    }

    public function bookeditpost(Request $request, $id)
    {
        $admin_id = Auth::id();
        $book = Book::findOrFail($id);

        $request->validate([
            'book_name' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'book_publisher' => 'required|string|max:255',
            'book_year_of_manufacture' => 'required|date',
            'book_amount' => 'required|integer',
            'book_category' => 'required|string|max:255',
            'book_status' => 'required|string|max:255',
        ]);

        $book->admin_id = $admin_id;
        $book->book_name = $request->input('book_name');
        $book->book_author = $request->input('book_author');
        $book->book_publisher = $request->input('book_publisher');
        $book->book_year_of_manufacture = $request->input('book_year_of_manufacture');
        $book->book_amount = $request->input('book_amount');
        $book->book_category = $request->input('book_category');
        // $book->book_status = $request->input('book_status');


        if ($request->hasFile('book_images')) {
            $request->validate([
                'book_images' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $book_images = $request->file('book_images');
            $book_images_name = time() . '.' . $book_images->getClientOriginalExtension();
            $book_images->move(public_path('images'), $book_images_name);
            $book->book_images = 'images/' . $book_images_name;
        }


        if ($request->hasFile('book_file')) {
            $request->validate([
                'book_file' => 'file|mimes:doc,docx,pdf|max:512000',
            ]);
            $book_file = $request->file('book_file');
            $book_file_name = time() . '.' . $book_file->getClientOriginalExtension();
            $book_file->move(public_path('book'), $book_file_name);
            $book->book_file = 'book/' . $book_file_name;
        }

        if ($book) {
            $book->book_status = $request->input('book_status');
        }

        $book->save();

        $request->session()->flash('success', 'Chỉnh sửa thông tin sách thành công!');
        return redirect()->route('booklist');
    }

    public function showbook($book_file_name)
    {
        $path = storage_path('app/public/' . $book_file_name);

        if (!file_exists($path)) {
            abort(404);
        }

        $file = file_get_contents($path);
        $type = mime_content_type($path);

        return response($file, 200)->header("Content-Type", $type);
    }

    public function bookdelete(Request $request, $id)
    {
        $book = book::findOrFail($id);
        $book->delete();
        $request->session()->flash('success', 'Xóa sách thành công!');
        return redirect()->route('booklist');

    }
}
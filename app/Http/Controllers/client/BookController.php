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

    public function getChildCategories($category_id)
    {
        $childCategories = subcategories::where('category_id', $category_id)->get();
        return response()->json($childCategories);
    }


    public function filterBooks(Request $request)
    {
        $query = book::query();

        if ($request->filled('parent_category_id')) {
            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('category_id', $request->parent_category_id);
            });
        }

        if ($request->filled('child_category_id')) {
            $query->where('id', $request->child_category_id);
        }

        $books = $query->paginate(6); // Số lượng sách hiển thị mỗi trang

        $categories = categories::all(); // Lấy tất cả danh mục cha

        return view('client/pages/book', compact('books', 'categories'));
    }


}

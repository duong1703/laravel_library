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
        $books = book::select('id', 'book_name', 'book_images', 'book_author', 'book_status' , 'book_category', 'created_at')->paginate(6);
        $categories = book::select('book_category', DB::raw('count(*) as book_count'))
            ->groupBy('book_category')
            ->get();

        return view('client/pages/book', compact('books', 'categories'));
    }

    public function searchBook(Request $request)
    {
        $searchTerm = $request->input('search');

        $dataBook = book::where('book_name', 'like', "%$searchTerm%")
                            ->orWhere("book_author","like", "%$searchTerm%")
                            ->orwhere('book_category', 'like', "%$searchTerm%")
                            ->paginate(6);
        $categories = book::select('book_category', DB::raw('count(*) as book_count'))
            ->groupBy('book_category')
            ->get();

        return view('client/pages/book', [
            'books' => $dataBook,
            'search' => $searchTerm,
            'categories' => $categories,
        ]);
    }

    public function saveBookRead(Request $request)
    {
        try {
            $userId = Auth::guard('member')->user()->id;

            if (!$userId || !is_int($userId)) {
                return response()->json(['success' => false, 'message' => 'Người dùng chưa đăng nhập hoặc ID không hợp lệ.'], 401);
            }

            $bookId = $request->input('book_id');

            $readBook = DB::table('readbook')->where('book_id', $bookId)->where('member_id', $userId)->first();

            if ($readBook) {
                DB::table('readbook')->where('book_id', $bookId)->where('member_id', $userId)
                    ->update([
                        'read_count' => $readBook->read_count + 1,
                        'last_read_at' => now(),
                    ]);
            } else {

                DB::table('readbook')->insert([
                    'book_id' => $bookId,
                    'member_id' => $userId,
                    'read_count' => 1,
                    'last_read_at' => now(),
                ]);
            }

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            \Log::error('Lỗi khi lưu lượt đọc sách: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi lưu lượt đọc sách.'], 500);
        }
    }

    public function getReadCountForBook($bookId)
    {

        $readCounts = Readbook::select('book_id', DB::raw('SUM(read_count) as total_read_count'))
            ->groupBy('book_id')
            ->get();


        return view('client/pages/book', compact('readCounts'));
    }

    public function getIDbook($id){
        $book = book::findOrFail($id);
        return view('client/pages/book', compact('book'));
    }
}

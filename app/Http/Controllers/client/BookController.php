<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\book;
use App\Models\admin\categories;
use App\Models\admin\readbook;
use App\Models\admin\comment;
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
        $books = book::select('id', 'book_name', 'book_images', 'book_author', 'book_status', 'book_category', 'created_at')->paginate(6);
        $categories = book::select('book_category', DB::raw('count(*) as book_count'))
            ->groupBy('book_category')
            ->get();
        // dd($categories);

        return view('client/pages/book', compact('books', 'categories'));
    }

    public function searchBook(Request $request)
    {
        $searchTerm = $request->input('search');

        $dataBook = book::where('book_name', 'like', "%$searchTerm%")
            ->orWhere("book_author", "like", "%$searchTerm%")
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
            // Kiểm tra xem người dùng đã đăng nhập chưa
            $userId = Auth::guard('member')->user()->id;

            if (!$userId || !is_int($userId)) {
                return response()->json(['success' => false, 'message' => 'Người dùng chưa đăng nhập hoặc ID không hợp lệ.'], 401);
            }

            // Lấy book_id từ request
            $bookId = $request->input('book_id');

            // Lấy tên sách từ bảng books
            $book = DB::table('book')->where('id', $bookId)->first();

            if (!$book) {
                return response()->json(['success' => false, 'message' => 'Không tìm thấy sách với ID này.'], 404);
            }

            // Kiểm tra xem người dùng đã đọc sách này chưa
            $readBook = DB::table('readbook')->where('book_id', $bookId)->where('member_id', $userId)->first();

            if ($readBook) {
                // Nếu đã đọc, cập nhật số lần đọc và thời gian đọc lần cuối
                DB::table('readbook')->where('book_id', $bookId)->where('member_id', $userId)
                    ->update([
                        'read_count' => $readBook->read_count + 1,
                        'last_read_at' => now(),
                    ]);
            } else {
                // Nếu chưa đọc, insert bản ghi mới
                DB::table('readbook')->insert([
                    'book_id' => $bookId,
                    'member_id' => $userId,
                    'read_count' => 1,
                    'last_read_at' => now(),
                ]);
            }

            // Trả về response thành công
            return response()->json(['success' => true, 'book_name' => $book->book_name]);

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

    public function getIDbook($id)
    {
        $book = book::findOrFail($id);
        return view('client/pages/book', compact('book'));
    }


    public function filterByCategory($category)
    {
        // Giải mã tham số nếu cần thiết
        $category = urldecode($category);

        // Lọc sách theo danh mục
        $books = Book::where('book_category', $category)->paginate(10);

        // Lấy danh sách danh mục hợp lệ còn sách (có sách liên quan)
        $categories = Book::select('book_category')
            ->selectRaw('COUNT(*) as book_count')
            ->groupBy('book_category')
            ->havingRaw('COUNT(*) > 0') // Chỉ lấy danh mục có sách
            ->get();

        return view('client/pages/book', compact('books', 'categories', 'category'));
    }



}

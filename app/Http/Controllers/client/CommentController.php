<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\book;
use App\Models\admin\comment;
use Illuminate\Http\Request;
use Log;
use Session;

class CommentController extends Controller
{

    public function user_comment_post(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:50',
            'book_id' => 'required|integer|exists:book,id',
            'member_id' => 'required|integer|exists:member,id',
            'answer_comment' => 'nullable|string',
        ]);

        $member_id = $request->input('member_id');
        $book_id = $request->input('book_id');

        $comment = new comment();
        $comment->comment = $request->input('comment');
        $comment->answer_comment = $request->input('answer_comment', '');
        $comment->book_id = $book_id;
        $comment->member_id = $member_id;

        $comment->save();

        session()->flash('success', 'Cảm ơn bạn đã nhận xét!');
        return redirect()->route('user_bookdetail_id', ['id' => $book_id]);
    }


    public function getBookDetail($id)
    {
        $bookdetail = Book::findOrFail($id);
        return view('client/pages/bookdetail', compact('bookdetail'));
    }
}

<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\member;
use App\Models\admin\readbook;
use DB;
use Illuminate\Http\Request;
use Auth;
use Session;

class AccountController extends Controller
{
    public function user_account()
    {
        if (Auth::guard('member')->check()) {
            $member_id = Auth::guard('member')->user()->id;
    
            $reads = DB::table('readbook')
                ->join('book', 'readbook.book_id', '=', 'book.id') 
                ->select('book.id as book_id', 'book.book_name', 'readbook.read_count', 'readbook.last_read_at') 
                ->where('readbook.member_id', $member_id) 
                ->paginate(5);
    
            return view('client/pages/account', compact('reads', 'member_id'));
        } else {
            return redirect()->route('user_login');
        }
    }
    
}

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
        $member_id = Session::get('member_id');
        $reads = readbook::where('member_id', $member_id)
            ->paginate(5);

        return view('client/pages/account', compact('reads', 'member_id'));
    }
}

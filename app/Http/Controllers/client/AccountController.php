<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\member;
use App\Models\admin\readbook;
use Illuminate\Http\Request;
use Auth;
use Session;

class AccountController extends Controller
{
    public function user_account()
    {
        return view('client/pages/account');
    }

    public function show_user_account()
    {
        $member_id = auth()->id();
        $reads = readbook::where('member_id', $member_id)->with('book')->latest()->get();

        return view('/account', compact('reads'));
    }
}

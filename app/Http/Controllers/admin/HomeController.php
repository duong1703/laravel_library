<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin_home()
    {
        $membercount = DB::table('member')->count();
        $admincount = DB::table('admin')->count();
        $categoriescount = DB::table('categories')->count();
        $subcategoriescount = DB::table('subcategories')->count();
        $bookcount = DB::table('book')->count();
        $unansweredCount = DB::table('message')->where('status', 'chưa trả lời')->count();
        return view('/admin/pages/home', [
            'membercount' => $membercount,
            'admincount' => $admincount,
            'categoriescount' => $categoriescount,
            'subcategoriescount' => $subcategoriescount,
            'bookcount' => $bookcount,
            '$unansweredCount' => $unansweredCount,
        ]);
    }
}

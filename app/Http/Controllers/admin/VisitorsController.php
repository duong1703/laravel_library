<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\readbook;
use Illuminate\Http\Request;
use Session;
use DB;

class VisitorsController extends Controller
{
    public function visitors_admin()
    {
       
        return view('/admin/pages/visitors/list');
    }

    public function showReadingChart() {
        $data = DB::table('readbook')
              ->join('book', 'readbook.book_id', '=', 'book.id') 
              ->select('book.book_name as book_name', 'readbook.read_count') 
              ->get();
    
        return response()->json($data);
    }
    

}

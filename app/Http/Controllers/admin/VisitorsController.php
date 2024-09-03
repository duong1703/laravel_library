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

    public function showReadingChart(){
        $data = DB::table('readbook')->select('book_id','read_count')->get();
        // return $data->toArray();
        return response()->json($data);
    }

}

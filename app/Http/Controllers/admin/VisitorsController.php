<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitorsController extends Controller
{
    public function visitors_admin(){
        return view('/admin/pages/visitors/list');
    }

   
}

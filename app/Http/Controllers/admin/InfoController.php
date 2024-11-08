<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function Infoversion(){
        return view('/admin/pages/info/infoversion');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\admin;
use Hash;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_admin(Request $request)
    {
       
        $admin = DB::table('admin')->get();
        
        return view('/admin/pages/admin/list', ['data' => $admin]);
    }

    public function addAdmin()
    {
        return view('/admin/pages/admin/add');
    }

    public function adminpost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin,email',
            'password' => 'required|string|min:8|max:9',
        ]);

        $admin = new Admin();

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));

        $admin->save();

        $request->session()->flash('success', 'Thêm mới quản trị viên thành công!');
        return redirect()->route('adminadd');
    }

    public function editAdmin($id)
    {
        $editAdmin = admin::findOrFail($id);
        return view('/admin/pages/admin/edit', compact('editAdmin'));
    }

    public function admineditpost(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin,email',
            'password' => 'required|string|min:8|max:9',
        ]);

        $admin = new Admin();

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        $request->session()->flash('success', 'Cập nhật quản trị thành công!');
        return redirect()->route('adminlist')->with('success', 'Cập nhật quản trị thành công!');
    }

    public function admindelete(Request $request, $id)
    {
        $member = admin::findOrFail($id);
        $member->delete();
        $request->session()->flash('success', 'Xóa quản trị thành công!');
        return redirect()->route('adminlist');

    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\admin;
use Hash;
use Gate;
use Auth;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_admin(Request $request)
    {
        if (!Gate::allows('manage-everything')) {
            abort(403, 'Bạn không có quyền truy cập trang này.');
        }

        $admin = DB::table('admin')->get();

        return view('/admin/pages/admin/list', ['data' => $admin]);
    }

    public function addAdmin()
    {
        if (!Gate::allows('manage-everything')) {
            abort(403, 'Bạn không có quyền thêm quản trị viên.');
        }

        return view('/admin/pages/admin/add');
    }

    public function adminpost(Request $request)
    {
        if (!Gate::allows('manage-everything')) {
            abort(403, 'Bạn không có quyền thêm quản trị viên.');
        }

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
        if (!Gate::allows('manage-everything')) {
            abort(403, 'Bạn không có quyền chỉnh sửa quản trị viên.');
        }
    
        $editAdmin = admin::findOrFail($id);
        return view('/admin/pages/admin/edit', compact('editAdmin'));
    }

    public function admineditpost(Request $request, $id)
    {
        if (!Gate::allows('manage-everything')) {
            abort(403, 'Bạn không có quyền chỉnh sửa quản trị viên.');
        }
    

        $user = Auth::user()->name;


        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'string|email|max:255',
            'password' => 'nullable|string|min:8|max:9',
            'role' => 'required|string|in:superadmin,admin',
        ];


        if (!is_object($user) || !$user->is_super_admin) {
            $rules['email'] .= '|unique:admin,email,' . $id;
        }


        $validatedData = $request->validate($rules);
        $admin = admin::find($id);

        if (!$admin) {
            return redirect()->route('adminlist')->with('error', 'Quản trị viên không tồn tại.');
        }

        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];


        if ($request->filled('password')) {
            $admin->password = Hash::make($validatedData['password']);
        }

        $admin->role = $validatedData['role'];
        $admin->save();

        $request->session()->flash('success', 'Cập nhật quản trị thành công!');
        return redirect()->route('adminlist')->with('success', 'Cập nhật quản trị thành công!');
    }

    public function admindelete(Request $request, $id)
    {
        if (!Gate::allows('manage-everything')) {
            abort(403, 'Bạn không có quyền xóa quản trị viên.');
        }
    
        $member = admin::findOrFail($id);
        $member->delete();
        $request->session()->flash('success', 'Xóa quản trị thành công!');
        return redirect()->route('adminlist');

    }
}

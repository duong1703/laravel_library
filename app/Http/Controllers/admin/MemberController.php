<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\member;
use Auth;
use DB;
use Hash;
use Mail;
use App\Mail\AuthenMemberMail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;


class MemberController extends Controller
{
    public function member_admin()
    {
        $member = member::with('admin')->get();
        return view('/admin/pages/member/list', ['data' => $member]);
    }

    public function addMember()
    {
        return view('/admin/pages/member/add');
    }

    public function memberpost(Request $request): RedirectResponse
    {
        $admin_id = Auth::id();
        
        $request->validate([
            'name_member' => 'required|string|max:255',
            'name_login' => 'required|string|max:255',
            'password' => 'required|string|min:9',
            'email' => 'required|string|email|max:255|unique:member,email',
            'role' => 'required|string|max:16',
            'born' => 'required|string|max:255',
            'numberphone' => 'required|string|max:10|unique:member,numberphone',
            'ID_number_card' => 'required|string|max:12|unique:member,ID_number_card',
            'address' => 'required|string|max:255',
        ]);

        $member = new member();
        $member->admin_id = $admin_id;
        $member->name_member = $request->input('name_member');
        $member->name_login = $request->input('name_login');
        $member->password = Hash::make($request->input('password'));
        $member->email = $request->input('email');
        $member->role = $request->input('role');
        $member->born = $request->input('born');
        $member->numberphone = $request->input('numberphone');
        $member->ID_number_card = $request->input('ID_number_card');
        $member->address = $request->input('address');
        $member->save();

        event(new Registered($member));
        Mail::to($member->email)->send(new AuthenMemberMail($request->input('email'), $request->input('password')));

        $request->session()->flash('success', 'Thêm thành viên thành công!');
        return redirect()->route('memberadd');
    }

    public function memberedit($id)
    {
        $editmember = member::findOrFail($id);
        return view('/admin/pages/member/edit', compact('editmember'));
    }

    public function membereditpost(Request $request, $id)
    {
        $admin_id = Auth::id();

        $validatedData = $request->validate([
            'name_member' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|string|max:16',
            'numberphone' => 'required|string|max:10',
            'ID_number_card' => 'required|string|max:12',
            'address' => 'required|string|max:255',
        ]);

        $member = member::findOrFail($id);

        $member->admin_id = $admin_id;
        $member->name_member = $validatedData['name_member'];
        $member->email = $validatedData['email'];
        $member->role = $validatedData['role'];
        $member->numberphone = $validatedData['numberphone'];
        $member->ID_number_card = $validatedData['ID_number_card'];
        $member->address = $validatedData['address'];
        $member->save();

        $request->session()->flash('success', 'Cập nhật thành viên thành công!');
        return redirect()->route('memberlist')->with('success', 'Cập nhật thành viên thành công!');
    }

    public function memberdelete(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        $request->session()->flash('success', 'Xóa thành viên thành công!');
        return redirect()->route('memberlist');

    }
}

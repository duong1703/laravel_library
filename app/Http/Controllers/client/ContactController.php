<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function user_contact()
    {
        return view('client/pages/contact');
    }

    public function postcontact(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:message,email',
            'ID_student' => 'required|string|max:50|unique:message,ID_student',
            'message' => 'required|string|max:255',
            // 'status' => 'required|string|max:255',
        ]);

        $message = new message();

        $message->fullname = $request->input('fullname');
        $message->email = $request->input('email');
        $message->ID_student = $request->input('ID_student');
        $message->message = $request->input('message');
        $message->status = 'chưa trả lời';

        $message->save();

        $request->session()->flash('success', 'Gửi tin nhắn thành công!');
        return redirect()->route('user_contact');
    }
}

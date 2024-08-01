<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\message;
use DB;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function message_admin()
    {
        $message = DB::table('message')->get();
        return view('/admin/pages/support/list', ['data' => $message]);
    }

    public function editMessage($id)
    {
        $message = Message::findOrFail($id);
        return view('/admin/pages/support/edit', compact('message'));
    }

    public function replyMessage(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        $message = Message::findOrFail($id);
        $message->reply = $request->input('reply');
        $message->status = 'đã trả lời';
        $message->save();

        return redirect()->route('message_admin')->with('success', 'Tin nhắn đã được trả lời!');
    }


    public function messagedelete(Request $request, $id)
    {
        $message = message::findOrFail($id);
        $message->delete();
        $request->session()->flash('success', 'Xóa tin nhắn thành công!');
        return redirect()->route('message_admin');

    }

}

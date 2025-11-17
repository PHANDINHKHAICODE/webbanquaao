<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HelpController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Lấy danh sách hiện tại trong session, nếu chưa có thì mảng rỗng
        $requests = Session::get('help_requests', []);

        // Thêm yêu cầu mới vào danh sách
        $requests[] = [
            'message' => $request->message,
            'time' => now()->toDateTimeString(),
        ];

        // Lưu lại danh sách vào session
        Session::put('help_requests', $requests);

        return redirect()->back()->with('success', 'Yêu cầu của bạn đã được gửi!');
    }

    public function adminView()
    {
        // Lấy danh sách yêu cầu trợ giúp từ session
        $requests = Session::get('help_requests', []);

        // Trả về view admin.show_help_requests kèm dữ liệu
        return view('admin.show_help_requests', compact('requests'));
    }
}

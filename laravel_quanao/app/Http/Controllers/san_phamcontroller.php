<?php

namespace App\Http\Controllers;

use App\Models\chi_tiet_don_hang;
use App\Models\danh_muc_san_pham;
use App\Models\don_hang;
use App\Models\san_pham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductReview;
use App\Models\Review;
class san_phamcontroller extends Controller
{
    // --------------------------
    // ADMIN - CRUD sản phẩm
    // --------------------------
    
    public function index()
    {
        $sanpham = DB::table('san_pham')->get();
        return view('admins.sanpham.index', compact('sanpham'));
    }

    public function create()
    {
        return view('admins.sanpham.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('anh_sanpham')) {
            $filename = $request->file('anh_sanpham')->getClientOriginalName();
            $path = $request->file('anh_sanpham')->storeAs('images', $filename, 'public');
            $data['anh_sanpham'] = 'client/' . $path;
        }
        san_pham::create($data);

        return redirect()->route('san_pham')->with('success', 'Thêm sản phẩm thành công!');
    }
    public function showProductDetailWithReviews($ma_san_pham)
    {
        $sanpham = san_pham::findOrFail($ma_san_pham);
    
        $reviews = Review::where('product_id', $ma_san_pham)
                         ->with('user')
                         ->orderBy('created_at', 'desc')
                         ->get();
    
        return view('client.chitietsanpham', compact('sanpham', 'reviews'));
    }
public function storeReview(Request $request, $ma_san_pham)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'required|string',
    ]);

    Review::create([
        'product_id' => $ma_san_pham, 
        'user_id' => auth()->id(),
        'rating' => $request->rating,
        'comment' => $request->comment,
    ]);

    return redirect()->back()->with('success', 'Đánh giá đã được gửi!');
}


    public function show(string $ma_san_pham)
    {
        $sanpham = san_pham::findOrFail($ma_san_pham);
        return view('admins.sanpham.show', compact('sanpham'));
    }

    public function edit(string $ma_san_pham)
    {
        $sanpham = san_pham::findOrFail($ma_san_pham);
        return view('admins.sanpham.edit', compact('sanpham'));
    }

    public function update(Request $request, string $ma_san_pham)
    {
        $sanpham = san_pham::findOrFail($ma_san_pham);

        if ($request->hasFile('anh_sanpham')) {
            $image = $request->file('anh_sanpham');
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('images', $filename, 'public');
            $sanpham->anh_sanpham = 'client/' . $path;
        }

        $sanpham->update($request->except('anh_sanpham'));

        return redirect()->route('san_pham')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy(string $id)
    {
        $sanpham = DB::table('san_pham')->where('ma_san_pham', $id);
        $sanpham->delete();
        return redirect()->route('san_pham')->with('success', 'Xóa sản phẩm thành công!');
    }

    // --------------------------
    // CLIENT - Hiển thị sản phẩm
    // --------------------------

    public function indexuser()
    {
        $sanpham = DB::table('san_pham')->get();
        $slider = DB::table('slider')->get();
        return view('client.layouts.index', compact('sanpham', 'slider'));
    }

    public function sanpham()
    {
        $sanpham = DB::table('san_pham')->get();
        return view('client.product', compact('sanpham'));
    }

    public function showProductDetailWithCategory($ma_san_pham)
    {
        $sanpham = san_pham::findOrFail($ma_san_pham);
        $ma_danh_muc = $sanpham->ma_danh_muc;
        $danhMuc = danh_muc_san_pham::findOrFail($ma_danh_muc);

        $sanPhams = san_pham::where('ma_danh_muc', $ma_danh_muc)
                             ->where('ma_san_pham', '!=', $ma_san_pham)
                             ->get();

        return view('client.chitietsanpham', compact('sanpham', 'danhMuc', 'sanPhams'));
    }

    // --------------------------
    // TÌM KIẾM SẢN PHẨM
    // --------------------------
    public function search(Request $request)
    {
        $query = $request->input('search');
    
        if ($query) {
            $sanpham = san_pham::where('ten_san_pham', 'like', "%{$query}%")
                                ->orWhere('mo_ta', 'like', "%{$query}%")
                                ->get();
        } else {
            $sanpham = collect(); // collection rỗng nếu không có từ khóa
        }
    
        // Trả về view search_results.blade.php
        return view('client.search_results', compact('sanpham', 'query'));
    }
    // --------------------------
    // GIỎ HÀNG
    // --------------------------
    public function addToCart($ma_san_pham)
    {
        $size = request('size','XL');
        $color = request('color','Xanh');
        $quantity = request('quantity',1);

        $sanpham = san_pham::findOrFail($ma_san_pham);

        $cart = session()->get('cart', []);

        if(isset($cart[$ma_san_pham])) {
            $cart[$ma_san_pham]['soluong'] += $quantity;
        } else {
            $cart[$ma_san_pham] = [
                "ten_san_pham" => $sanpham->ten_san_pham,
                "anh_san_pham" => $sanpham->anh_sanpham,
                "gia_tien" => $sanpham->gia,
                "soluong" => $quantity,
                "mausac" => $color,
                "kichco" => $size
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function removeCart(Request $request)
    {
        if($request->ma_san_pham){
            $cart = session()->get('cart');
            if(isset ($cart[$request->ma_san_pham])){
                unset($cart[$request->ma_san_pham]);
                session()->put('cart', $cart);
            }
        }
    }

    public function updateCart(Request $request)
    {
        if($request->ma_san_pham && $request->soluong){
            $cart = session()->get('cart');
            $cart[$request->ma_san_pham]["soluong"] = $request->soluong;
            session()->put('cart', $cart);
        }
    }

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);
        $tongtien = 0;

        if(empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng đang trống!');
        }

        foreach($cart as $item){
            $tongtien += $item['gia_tien'] * $item['soluong'];
        }

        $user = Auth::user();
        $order = new don_hang();
        $order->ngay_dat_hang = date("Y/m/d");
        $order->tong_tien = $tongtien;
        $order->ma_khach_hang = $user->id;
        $order->trang_thai = 2;
        $order->ten_khach = request('ten');
        $order->dia_chi = request('thanhpho');
        $order->ghi_chu = request('ghichu');
        $order->save();

        foreach ($cart as $key => $value) {
            chi_tiet_don_hang::create([
                'ma_chi_tiet_don_hang' => $order->ma_chi_tiet_don_hang,
                'ma_don_hang' => $order->ma_don_hang,
                'ma_san_pham' => $key,
                'ten_san_pham' => $value['ten_san_pham'],
                'gia' => $value['gia_tien'],
                'so_luong' => $value['soluong'],
                'kich_co' => $value['kichco'],
                'mau_sac' => $value['mausac']
            ]);
        }

        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Đặt hàng thành công!');
    }
}

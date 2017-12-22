<?php

namespace App\Http\Controllers\Customer;

use App\Models\Hoadon;
use App\Models\Sanpham;
use App\Models\Customer;
use App\Models\CT_Hoadon;
use App\Mail\OrderConfirm_C;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mail\ratingMechant;
use Cart;
use Redirect;
use Session;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        //checkout
        if(Auth::guard('customer')->check())
        {
            $cartItems = Cart::content();
            // $customer =
            return view('customer.pages.checkout',compact('cartItems'));
        } else {
            return redirect()->route('customer.login');
        }
    }

    public function checkout(Request $request) {
        $userid = Auth::guard('customer')->user()->id_c;
        $phoneNum = Auth::guard('customer')->user()->sdt;
        $cartItems = Cart::content();
        // Hoadon::insert('');
        $newOrder = new Hoadon();
        $newOrder->id_c = $userid;
        $newOrder->trang_thai = 0;

        $newOrder->dia_chi = $request->input('address');
        // dd($request->input('address'));
        $newOrder->ghi_chu_KH = $request->input('ghi_chu_KH');
        $newOrder->sdt = $phoneNum;
    
        // $newOrder->trang_thai
        $newOrder->tong_tien = Cart::total();
        $newOrder->save();


        foreach ($cartItems as $item) {
            $orderDetail = new CT_Hoadon();
            $orderDetail->id_hd = $newOrder->id;
            $orderDetail->id_sp = $item->id;
            $orderDetail->id_m = $item->options->id_m;
            $orderDetail->so_luong = $item->qty;
            $orderDetail->tong_tien = $item->subtotal;
            $orderDetail->trang_thai = 0;
            $orderDetail->rating = 0;
            $orderDetail->save();

            //update so luong
            $product = Sanpham::find($item->id);
            $updateStock = $product->so_luong_ton_kho - $item->qty;
            Sanpham::where('id', $item->id)->update(['so_luong_ton_kho' => $updateStock]);
          }
        $inserted_hoadon = Hoadon::where('id',$newOrder->id)->first();
        $inserted_chitiethoadon = CT_Hoadon::where('id_hd',$newOrder->id)->get();
        $ho_ten = Auth::guard('customer')->user()->ho_ten;
        $u_email = Auth::guard('customer')->user()->email;


         Mail::to($u_email)->send(new OrderConfirm_C($ho_ten,$inserted_hoadon,$inserted_chitiethoadon ));
        Cart::destroy();
        Session::flash('success','Payment success');
        return Redirect::route('dathangthanhcong');
    }
function dathangthanhcong()
{
  return view('customer.pages.dathangthanhcong');
}



}

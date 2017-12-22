<?php

namespace App\Http\Controllers\Customer;
// use DB, Auth, Cart, Session;
use Illuminate\Http\Request;
use \Cart as Cart;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use Illuminate\Database\Eloquent\Model;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        return view('customer.pages.carts', compact('cartItems'));
    }
    public function addItem(Request $request, $id) {


        $product = Sanpham::find($id);
        // dd($id);
        $qty = $request->qty;
        //update if product had in cart

        $item = Cart::search(function ($cart, $key) use($id) {
          return $cart->id == $id;
        })->first();
        if($item)
        {
        if($item->options['stock'] < $qty + $item->qty )
        {
          Session::flash('error','Không đủ số lượng có sẵn');
        }
        else {
          Cart::add(['id' => $id, 'name' => $product->ten_san_pham, 'qty' => $qty, 'price' =>  $product->don_gia,
           'options'=> ['stock' => $product->so_luong_ton_kho, 'id_m' => $product->id_m]]);
        }
        }
        else {
          Cart::add(['id' => $id, 'name' => $product->ten_san_pham, 'qty' => $qty, 'price' =>  $product->don_gia,
           'options'=> ['stock' => $product->so_luong_ton_kho, 'id_m' => $product->id_m]]);
        }
        return redirect()->back();
    }


    public function destroy($id) {
        $item = Cart::get($id);
        // dd($id);
        $pro = Sanpham::where('ten_san_pham', $item->name)->first();

        Cart::remove($id);
        return back();
    }


    function modifytocart(Request $request)
  {

    $rowId = $request->rowId;
    $qty = $request->qty;
    if(Cart::get($rowId)->options['stock'] < $qty)
    {
        Session::flash('error','Không đủ số lượng có sẵn');
    }
    else {
          Cart::update($rowId,$qty);
    }

  }
    function minustocart($rowId)
  {
    if($rowId)
    {
    $cart_QTY = Cart::get($rowId)->qty;
    Cart::update($rowId,$cart_QTY-1);
    return redirect()->back();
    }
  }
  function plustocart($rowId)
  {
    $cart_QTY = Cart::get($rowId)->qty;
    if(Cart::get($rowId)->options['stock'] < $cart_QTY + 1)
    {
        Session::flash('error','Không đủ số lượng có sẵn');
    }
    else {
        Cart::update($rowId,$cart_QTY+1);
    }

    return redirect()->back();
  }

}

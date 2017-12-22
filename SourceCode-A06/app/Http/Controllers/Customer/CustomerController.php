<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use App\Models\Hoadon;
use App\Models\Danhmuc;
use App\Models\CT_Hoadon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Models\Merchant;
use Hash;
use Session;
// use Illuminate\Database\Query\Builder;

class CustomerController extends Controller
{
    public function getProfile() {
        $idCus = Auth::guard('customer')->user()->id_c;
        // $cus = Customer::where('id', $idCus)->select('*')->first();
        $cus = DB::table('customer')->where('id_c', $idCus)->select('*')->first();
        // dd($cus);
        return view('customer.pages.profile-info', compact('cus'));
    }

    public function updateProfile(Request $request) {
        $idCus = Auth::guard('customer')->user()->id_c;
        $customer = Customer::findOrFail($idCus);
        // dd($customer);
        $rules = [
            'name' => 'required|string|max:50',
            'username' => 'required|string',
            'phoneNum' => 'required|string',
            'address' => 'required|string',
        ];
        $messages = [
            'name.required' => 'Bạn chưa nhập Họ tên',
            'name.max' => 'Họ tên quá dài. Vui lòng nhập lại',
            'phoneNum.required' => 'Bạn chưa nhập số điện thoại',
            'address.required' => 'Bạn chưa nhập địa chỉ.',
        ];

         $validator = Validator::make($request->all(), $rules, $messages);
        // dd($validator);

        if( $validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $customer->ten_dang_nhap = $request->input('username');
            $customer->ho_ten = $request->input('name');
            $customer->sdt = $request->input('phoneNum');
            $customer->dia_chi =  $request->input('address');
            $customer->gioi_tinh = $request->input('sex');
            $customer->save();

            return redirect()->back()->with('status', 'Thông tin của bạn đã được cập nhật');
        }

    }
    public function getHistory() {
        $idCus = Auth::guard('customer')->user()->id_c;
        $hoadon = Hoadon::where(['id_c' => $idCus])->get();
        return view('customer.pages.profile-history-orders', compact('hoadon'));
    }

    public function getOrderDetail(Request $request) {
        $cthd = CT_Hoadon::where('id_hd', $request->id)->get();
        $hd = Hoadon::where('id', $request->id)->first();
        //dd($hd)
        // dd($cthd);
        return view('customer.layouts.modalctdh-partial')->with(['cthd'=>$cthd,'hd'=>$hd]);
        //return view('customer.pages.profile-order-detail', compact('cthd'));
    }


    public function getOrdersFinish() {
        $idCus = Auth::guard('customer')->user()->id;
        $hoadon = Hoadon::where('id_c', $idCus)->get();


        return view('customer.pages.profile-orders-finish');
    }

    public function getOrdersProcessing() {
        $idCus = Auth::guard('customer')->user()->id;
        $cthd = CT_Hoadon::where(['id_hd' => Hoadon::where('id_c', $idCus)->get()], ['trang_thai'=> 0])->get();
        dd($cthd);
        return view('customer.pages.profile-orders-processing', compact('cthd'));
    }

    public function getPassword() {
        return view('customer.pages.profile-password');
    }

    public function updatePassword(Request $request) {
        $idCus = Auth::guard('customer')->user()->id_c;
        $customer = Customer::findOrFail($idCus);
        $rules = [
            'old_password' => 'required',
            'password' => 'required|string|min:5|confirmed',

        ];
        $messages = [
            'old_password.required' => 'Bạn chưa nhập mật khẩu hiện tại',
            'password.min' => 'Mật khẩu quá ngắn',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.confirmed' => 'Nhập lại mật khẩu sai',

        ];

         $validator = Validator::make($request->all(), $rules, $messages);

         if( $validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        } else if (!Hash::check($request->input('old_password'), $customer->password)) {
            return back()->withErrors(['old_password' => 'Mật khẩu hiện tại không đúng. Vui lòng kiểm tra lại!']);
        } else {
            // dd('dung roi');
            $customer->password = Hash::make($request->input('password'));
            $customer->save();
            return back()->with('status', 'Bạn đã thay đổi mật khẩu thành công');
        }
    }

    //rating
    public function getRating($id_hd,$id_c,$id_m) {

          $decode_id_hd =  Crypt::decryptString($id_hd);

  
        if(Auth::guard('customer')->check())
        {
        if(Auth::guard('customer')->user()->id_c == $id_c)
        {
        $lst_cthd = CT_Hoadon::where('id_m',$id_m)->where('id_hd', $decode_id_hd)->get();
          $merchant = Merchant::where('id_m',$id_m)->first();

          $trang_thai_danh_gia =DB::table('ct_hoa_don')
           ->where([
               ['id_hd', $decode_id_hd],
               ['id_m',$id_m]
              ])->select('*')->first();

          if($trang_thai_danh_gia->rating == 0 )
          {
        return view('customer.layouts.rating-merchant')->with(['id_hd'=>$decode_id_hd,'lst_cthd'=>$lst_cthd,'id_c'=>$id_c,'merchant'=>$merchant]);
        }
        else
        {
          Session::flash('error','Bạn đã đánh giá đơn hàng này ! Xin cảm ơn');
          return redirect()->route('home');
        }
      }
      else {
        Session::flash('error','Bạn không có quyền đánh giá đơn hàng này vì bạn không phải là chủ đơn hàng ! Xin cảm ơn!');
        return redirect()->route('home');
      }
    }

      else {
        return redirect()->route('customer.login');
      }
    }
}

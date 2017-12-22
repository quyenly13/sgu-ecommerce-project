<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Mail;
use Hash;
use App\Models\Hoadon;
use App\Models\Danhgia;
use App\Models\CT_Hoadon;
use App\Mail\verifyNewEmailWebmaster;
use App\Models\Quantrivien;
use App\Models\Merchant;
use App\Models\Customer;
use App\Models\Phieuthu;
use DB;
use Carbon; //  DateTime string will be 2014-04-03 13:57:34


class WebmasterController extends Controller
{

  public function index()
  {
      $id= Auth::guard('webmaster')->user()->id;
      $date = new Carbon\Carbon; //  DateTime string will be 2014-04-03 13:57:34
      $date->subWeek(); // or $date->subDays(7),  2014-03-27 13:58:25
      $mer_count = Merchant::where('created_at', '>', $date->toDateTimeString() )->count();
      $cus_count = Customer::where('created_at','>',$date->toDateTimeString())->count();
      $muatin_count = Phieuthu::where('created_at','>',$date->toDateTimeString())->count();

      $lst_donhangganday = Hoadon::OrderBy('created_at','desc')->take(7)->get();
      $top_banchay = CT_Hoadon::with('merchant')->where('trang_thai', 2)->select('id_sp',DB::raw('SUM(so_luong) as sum'))->orderBy('so_luong','desc')->groupBy('id_sp')->take(5)->get();
      $danhgiaganday = Danhgia::orderBy('created_at','desc')->take(4)->get();
      return view('webmaster.home')->with(['mer_count'=>$mer_count,'cus_count'=>$cus_count,'hoadon_count'=>$muatin_count,'id'=>$id,'danhgiaganday'=>$danhgiaganday,'lst_donhangganday'=>$lst_donhangganday,'top_banchay'=>$top_banchay]);
  }

  function index_webmaster()
  {
    $webmasters = Quantrivien::paginate(12);
    return view('webmaster.quanlywebmaster')->with(['webmasters'=>$webmasters]);
  }

  function suathongtin($id)
  {
    $webmaster = Quantrivien::find($id);
    return view('webmaster.suathongtin')->with(['w'=>$webmaster]);
  }
  function postsuathongtin($id)
  {
      $rules = array(
          'email'=> 'required|email|unique:quan_tri_vien',
      );
      $validator = Validator::make(Input::all(), $rules);

      // process
      if ($validator->fails()) {
          return redirect()->back()
              ->withErrors($validator)
              ->withInput(Input::all());
      }
      else {
      $webmaster = Quantrivien::find($id);
      $new_email = Input::get('email');
      if($new_email != $webmaster->email)
      {
        $this->sendEmail($webmaster,$new_email);
        session()->flash('status','Thư xác nhận email mới đã được gửi đi. Yêu cầu xác nhận Email');
      }
      return redirect()->back();
    }
  }
  function postsuapassword($id)
  {
      $rules = array(
            'password' => 'required|string|min:6|confirmed',
            'old_password' => 'required|string|min:6',
          );
      $validator = Validator::make(Input::all(), $rules);

      // process
      if ($validator->fails()) {
          return redirect()->back()
              ->withErrors($validator);
      }
      else
      {
      $webmaster = Quantrivien::where('id',$id)->first();
      if(!Hash::check(Input::get('old_password'), Auth::guard('webmaster')->user()->mat_khau))
      {
        return redirect()->back()->with('fail','Nhập không đúng password hiện tại!');
      }
      else {
        $webmaster->mat_khau =  bcrypt(Input::get('password'));
        $webmaster->save();
        return redirect()->back()->with('success','Đã Đổi Mật Khẩu Thành Công !!!!!');
      }
    }
  }

    public function sendEmail($thisWebmaster,$new_email)
    {
        Mail::to($new_email)->send(new verifyNewEmailWebmaster($thisWebmaster,$new_email));
    }
     public function NewWebmasterEmailDone($id,$email)
     {
         $webmaster = Quantrivien::find($id);
         if($webmaster)
         {
             $webmaster->email = $email;
             $webmaster->save();
             return redirect('webmaster/suathongtin/'.$id)->with('success','Đã Xác Nhận Thành Công !!!!!');
         }
         else{
             return redirect('webmaster/login')->with('error','Lỗi xác nhận');
         }

     }

     public function GetDanhGia()
     {

       $danhgias = DB::table('merchant')
  ->select([
    'merchant.id_m',
    'merchant.ten_dang_nhap',
    DB::raw('COUNT(danh_gia.id_m) AS count'),
    DB::raw('AVG(diem_so) AS avg'),
  ])
  ->leftJoin('danh_gia', 'danh_gia.id_m', '=', 'merchant.id_m')
  ->groupBy('merchant.ten_dang_nhap','merchant.id_m')
  ->get();
        return view('webmaster.thongkedanhgia',['danhgias'=>$danhgias]);
     }
     public function GetDonHang()
     {
       $donhangs = Hoadon::all();
        return view('webmaster.xemtoanbodonhang',['donhangs'=>$donhangs]);
     }

     public function showDetailInvoice(request $request){

       $detail_invoice = CT_Hoadon::where('id_hd',$request->id_hd)->get();
       $hd = Hoadon::find($request->id_hd);

        return view('webmaster.modalctdh-partial')->with(['detail_invoice'=>$detail_invoice,'hd'=>$hd]);

     }

     public function showDetailInvoiceM(request $request){

       $detail_invoice = CT_Hoadon::where('id_hd',$request->id_hd)->where('id_m',$request->idm)->get();
       $hd = Hoadon::find($request->id_hd);
        return view('webmaster.modalctdh-partial')->with(['detail_invoice'=>$detail_invoice,'hd'=>$hd]);

     }
     function laydonhangtheotrangthai(Request $request)
     {

      $list_invoice = CT_Hoadon::where('id_m',$request->id)->where('trang_thai',$request->tt)->select(DB::raw('SUM(tong_tien) as SUM'),'id_m','id_hd','trang_thai')->groupBy('id_m','id_hd','trang_thai')->get();
       //return $list_invoice;
      return view('webmaster.tabledh-partial')->with(['list_invoice' => $list_invoice]);
     }

  }

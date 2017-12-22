<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Taikhoanbikhoa;
use App\Models\Danhgia;
use App\Models\Hoadon;
use DB;
use Session;
class CustomerController extends Controller
{
  function index_admin()
  {
    $customers = Customer::paginate(12);
    return view('webmaster.quanlynguoimua')->with(['customers'=>$customers]);
  }
  function thong_tin_customer_admin($id)
  {
    $customer = Customer::where('id_c',$id)->first();
    $hoadon = Hoadon::where('id_c', $id)->get();
    $danhgia = Danhgia::where('id_c',$id)->get();
   return view('webmaster.thongtinnguoimua')->with(['cus'=>$customer,'lst_hd'=>$hoadon,'lst_dg'=>$danhgia]);
  }

  function Rating(request $request)
  {

      //return $request->all();
       $trang_thai_danh_gia =DB::table('ct_hoa_don')
        ->where([
            ['id_hd',$request->id_hd],
            ['id_m',$request->id_m]
           ])->select('*')->first();
           //return $trang_thai_danh_gia->trang_thai_danh_gia;
           $listct =DB::table('ct_hoa_don')
          ->where([
              ['id_hd',$request->id_hd],
              ['id_m',$request->id_m]
           ])->get();

          if($trang_thai_danh_gia->rating == 0)
          {
            $dg = new Danhgia;
              $dg->id_m = $request->id_m;
              $dg->id_c = $request->id_c;
              $dg->diem_so = $request->diem_so;
              $dg->save();
              foreach($listct as $item)
               {
                   $sp = \App\Models\CT_Hoadon::find($item->id);
                   $sp->rating = 1;
                   $sp->save();
               }
          }


          $avr_rating = Danhgia::where('id_m',$request->id_m)->avg('diem_so');
          if($avr_rating <= 1)
          {
            $tkbk = new Taikhoanbikhoa;
            $tkbk->id_m = $request->id_m;
            $tkbk->id_w = 1;
            $tkbk->li_do = "Người bán có điểm đánh giá xấu";
            $tkbk->trang_thai = 0;
            $tkbk->save();

            DB::table('merchant')
            ->where('id_m', $request->id_m)
            ->update(['trang_thai' => -1]);
          }


          Session::flash('success','Bạn đã đánh giá người bán thành công! Cảm ơn bạn đã đóng góp ý kiến ! ');
          return redirect('/home');
  }
}

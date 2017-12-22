<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phieuthu;
use Validator;
use Carbon\Carbon;
use DB;
class PhieuThuController extends Controller
{
    public function ShowDoanhThuView()
    {
      return view('webmaster.thongkedoanhthu');
    }
    public function GetDoanhThu(Request $request)
    {
      $validator = Validator::make($request->all(), [
         'tu_ngay' => 'required|date_format:d/m/Y',
         'den_ngay' => 'required|date_format:d/m/Y|after_or_equal:tu_ngay',
     ]);

     if ($validator->fails()) {
         return redirect('webmaster/tkdoanhthugoitin')
                     ->withErrors($validator)
                     ->withInput();
     }
     else{
          //$tu_ngay = Carbon::parse($request->tu_ngay);
          $input  = '11/06/1990';
          $format = 'd/m/Y';
          $tu_ngay = Carbon::createFromFormat($format, $request->tu_ngay)->format('Y/m/d');
          $den_ngay = Carbon::createFromFormat($format, $request->den_ngay)->format('Y/m/d');

          $list_invoice_buy_post = PhieuThu::whereDate('created_at','>=',$tu_ngay)->whereDate('created_at','<=',$den_ngay)->whereDate('updated_at','>=',$tu_ngay)->whereDate('updated_at','<=',$den_ngay)->select((DB::raw('DATE(created_at) as date')),DB::raw('SUM(tong_tien) as sum'))->groupBy('date')->get();
      }
           return view('webmaster.thongkedoanhthu',['lst_phieuthu'=>$list_invoice_buy_post]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Merchant;
use App\Models\Taikhoanbikhoa;
class TaiKhoanBiKhoaController extends Controller
{
    function index()
    {

    $count =  DB::table('tai_khoan_bi_khoa')->select('id_m', DB::raw('COUNT(*) as so_lan'))->groupBy('id_m')
    ->whereIn('id_m', function($query)
    {
        $query->select('id_m')
              ->from('tai_khoan_bi_khoa')
              ->where('trang_thai',0);
    })->get();

      $tk_bikhoa = Taikhoanbikhoa::where('trang_thai',0)->get();
      //$result = $tk_bikhoa->merge($count);
      //dd($result);


      return view('webmaster.xu-ly-khoa-tk')->with(['tkbk'=>$tk_bikhoa,'count'=>$count]);

    }

    function mokhoamerchant($id)
    {
      $tk_bi_khoa = Taikhoanbikhoa::where('id_m',$id)->where('trang_thai',0);
      $tk_bi_khoa->update(['trang_thai'=>1]);
      DB::table('merchant')
      ->where('id_m', $id)
      ->update(['trang_thai' => 1]);



      return redirect()->back()->with('success', 'Đã mở khóa cho người bán');
    }
    function khoamerchant(Request $request)
    {
      $ktk = new Taikhoanbikhoa();
      $ktk->id_m = $request->id_m;
      $ktk->id_w = 1;
      $ktk->li_do = $request->li_do;
      $ktk->trang_thai = 0;
      $ktk->save();


      //$tk_bi_khoa->update(['trang_thai'=>1]);
      DB::table('merchant')
      ->where('id_m', $request->id_m)
      ->update(['trang_thai' => -1]);



      return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Customer;
use App\Models\Phieuthu;
use DB;
use App\Models\Taikhoanbikhoa;
use Auth;
use Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\CT_Hoadon;
use App\Models\Hoadon;
use Hash;
use App\Mail\ratingMechant;
use Carbon\Carbon;
use Query\Builder;
use Session;
use App\Models\Danhgia;
use App\Models\Sanpham;
class MerchantController extends Controller
{
  public function __construct()
     {
         //$this->middleware('merchant_auth');
         $this->merchant =  \Auth::guard('merchant')->user();
     }

     /**
      * Show the application dashboard.
      *
      * @return \Illuminate\Http\Response
      */

          //xem chi tiet ben webmaster
     public function index_admin()
     {
          $merchants = Merchant::paginate(12);

         return view('webmaster.quanlynguoiban')->with(['merchants'=>$merchants]);
     }

     //thong tin merchant show duoi admin
     function thong_tin_merchant_admin($id)
     {
      $merchant = Merchant::where('id_m',$id)->first();
      $tk_bikhoa = Taikhoanbikhoa::where('id_m',$id)->get();
      $danhgia = Danhgia::where('id_m',$id)->select('id_m',(DB::raw('COUNT(*) as count')),(DB::raw('AVG(diem_so) as avg')))->groupBy('id_m')->first();
      if(!$danhgia)
      {
        $danhgia = new Danhgia();
        $danhgia->count = 0;
        $danhgia->avg = "CHƯA CÓ";
      }
      $lst_danhgia = Danhgia::where('id_m',$id)->get();
      $lst_muatin = Phieuthu::where('id_m',$id)->get();
      $list_invoice = CT_Hoadon::where('id_m',$id)->where('trang_thai',2)->select(DB::raw('SUM(tong_tien) as SUM'),'id_m','id_hd','trang_thai')->groupBy('id_m','id_hd','trang_thai')->get();
       //return $list_invoice;
      return view('webmaster.thongtinnguoiban')->with(['lst_danhgia'=>$lst_danhgia,'merchant'=>$merchant,'khoas'=>$tk_bikhoa,'danhgia'=>$danhgia,'list_invoice' => $list_invoice,'list_goitin'=>$lst_muatin]);
     }






     public function index()
     {
         $id= Auth::guard('merchant')->user()->id_m;
         $soluong_baidang = DB::table('san_pham')
         ->where([
                 ['san_pham.id_m',Auth::guard('merchant')->user()->id_m],
                 ['san_pham.trang_thai',1]
             ])->count();
        $soluong_tinduocdang = DB::table('merchant')
        ->where('id_m',Auth::guard('merchant')->user()->id_m)->select('so_luong_tin')->first();

        $danh_gia = DB::table('danh_gia')
        ->where([
                 ['danh_gia.id_m',Auth::guard('merchant')->user()->id_m],
             ])->orderBy('diem_so','desc')
        ->select('diem_so as label', DB::raw('count(danh_gia.diem_so) as value'))
        ->groupBy('diem_so')->get();

        $diemtb = DB::table('danh_gia')
        ->where([
                 ['danh_gia.id_m',Auth::guard('merchant')->user()->id_m],
             ])
        ->orderBy('diem_so','desc')
         ->avg('diem_so');

       $array_name = array();
        foreach($danh_gia as $item)
         {
              $array_name[] = array(
                'label'  => $item->label .' Sao',
                'value'  => $item->value,
                );

         }
        $array_name = json_encode($array_name);

        $soluong_donhang = DB::table('hoa_don')
        ->join('ct_hoa_don','ct_hoa_don.id_hd','=','hoa_don.id')
        ->join('san_pham', 'ct_hoa_don.id_sp', '=', 'san_pham.id')
        ->where([
                  ['san_pham.id_m',Auth::guard('merchant')->user()->id_m],
                  ['ct_hoa_don.trang_thai',0],
              ])->count();
             // return $soluong_donhang;

        $sanpham_saphet = Sanpham::where([
            ['so_luong_ton_kho','<=',5],
            ['so_luong_ton_kho','>',0],
            ['id_m',Auth::guard('merchant')->user()->id_m],
            ['trang_thai',1]
            ])->get();

         return view('merchants.home',compact('id','soluong_baidang','soluong_tinduocdang','soluong_donhang','array_name','diemtb','sanpham_saphet'));
     }
     //Xem chi tiết thông tin merchant
     public function ShowViewProfile()
     {
        $merchant = DB::table('merchant')
        ->where('id_m',Auth::guard('merchant')->user()->id_m)->select('*')->first();
        return view('merchants.profile',compact('merchant'));
     }

     //Update profile info ununique
     public function updateProfile(request $request)
     {
        $validator = Validator::make($request->all(), [
            'ten_dang_nhap' => 'required|string|max:255',
            'ho_ten' => 'required|string|max:255',
            'gioi_tinh'=> 'required',
            'dia_chi' => 'required|string|max:255',
            'so_tk' => 'required|numeric',

        ]);
        $merchant = DB::table('merchant')
        ->where('id_m',Auth::guard('merchant')->user()->id_m)->select('*')->first();

         if ($validator->fails()) {
            return redirect('/merchant/thong-tin-ca-nhan')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

                Merchant::where('id_m',Auth::guard('merchant')->user()->id_m)->update([
                        'ten_dang_nhap'=>$request->ten_dang_nhap,

                        'ho_ten'=>$request->ho_ten,
                        'gioi_tinh'=>$request->gioi_tinh,

                        'dia_chi'=>$request->dia_chi,
                        'so_tk'=>$request->so_tk,
                ]);
                return redirect('/merchant/thong-tin-ca-nhan')->with("success","Cập nhật thành công");
            }
     }

     //check mật khẩu

    //update mật khẩu
    public function changePassword(request $request)
    {
        $password = DB::table('merchant')
        ->where('id_m',Auth::guard('merchant')->user()->id_m)->select('merchant.mat_khau')->first();

            if(Hash::check($request->password_old,$password->mat_khau))
            {
                $validator = Validator::make($request->all(), [
                    'password' => 'required|string|min:6|confirmed',
                ]);
                if ($validator->fails()) {
                    return redirect('/merchant/thong-tin-ca-nhan')
                                ->withErrors($validator)
                                ->withInput();
                }
                else{
                    Merchant::where('id_m',Auth::guard('merchant')->user()->id_m)->update(['mat_khau'=>bcrypt($request->password)]);
                    return redirect()->back()->with('success', 'Đổi mật khẩu thành công');
                }

            }
            else
            {
                return redirect()->back()->withErrors('Mật khẩu không đúng');
            }

        return redirect()->back();
    }
    //update email, sdt, cmnd
     public function updateProfile_Info(request $request)
     {
         if(array_key_exists("email", $request->except('_token')))
         {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255',
            ]);
            if ($validator->fails()) {
                return redirect('/merchant/thong-tin-ca-nhan')
                            ->withErrors($validator)
                            ->withInput();
            }
            else
            {
                $merchant = DB::table('merchant')
                ->where('id_m',Auth::guard('merchant')->user()->id_m)->select('*')->first();
                if($request->email!=$merchant->email)
                {
                    $check_email = DB::table('merchant')
                    ->where('email',$request->email)->select('merchant.email')->count();
                   // return $check_email;
                    if($check_email < 1)
                    {
                        Merchant::where('id_m',Auth::guard('merchant')->user()->id_m)->update(['email'=>$request->email]);
                        return redirect('/merchant/thong-tin-ca-nhan')->with("success","Cập nhật thành công");
                    }
                    else{

                        return redirect('/merchant/thong-tin-ca-nhan')->withErrors("Email đã tồn tại");
                    }
                }
            }

         }
        elseif(array_key_exists("sdt", $request->except('_token'))){
            $validator = Validator::make($request->all(), [
                'sdt' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return redirect('/merchant/thong-tin-ca-nhan')
                            ->withErrors($validator)
                            ->withInput();
            }
            else
            {
                $merchant = DB::table('merchant')
                ->where('id_m',Auth::guard('merchant')->user()->id_m)->select('*')->first();
                if($request->sdt!=$merchant->sdt)
                {
                    $check_sdt = DB::table('merchant')
                    ->where('sdt',$request->sdt)->select('*')->first();
                    if($check_sdt=="")
                    {
                        Merchant::where('id_m',Auth::guard('merchant')->user()->id_m)->update(['sdt'=>$request->sdt]);
                        return redirect('/merchant/thong-tin-ca-nhan')->with("success","Cập nhật thành công");
                    }
                    else{
                        return redirect('/merchant/thong-tin-ca-nhan')->withErrors("Số điện thoại đã tồn tại");
                    }
                }
            }

        }
        elseif(array_key_exists("so_cmnd", $request->except('_token'))){
            $validator = Validator::make($request->all(), [
                'so_cmnd' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return redirect('/merchant/thong-tin-ca-nhan')
                            ->withErrors($validator)
                            ->withInput();
            }
            else
            {
                $merchant = DB::table('merchant')
                ->where('id_m',Auth::guard('merchant')->user()->id_m)->select('*')->first();
                if($request->so_cmnd!=$merchant->so_cmnd)
                {
                    $check_cmnd = DB::table('merchant')
                    ->where('so_cmnd',$request->so_cmnd)->select('*')->first();
                    if($check_cmnd=="")
                    {
                        Merchant::where('id_m',Auth::guard('merchant')->user()->id_m)->update(['so_cmnd'=>$request->so_cmnd]);
                        return redirect('/merchant/thong-tin-ca-nhan')->with("success","Cập nhật thành công");
                    }
                    else{
                        return redirect('/merchant/thong-tin-ca-nhan')->withErrors("Chứng minh thư đã tồn tại");
                    }
                }
            }
        }
        return redirect('/merchant/thong-tin-ca-nhan');
     }

     public function showInvoiceList()
     {

       //return $list_invoice;
       return view('merchants.invoicelist');
     }
      public function getInvoiceList($stt)
      {

        $controller = new MerchantController();
        $id_list= DB::table('ct_hoa_don')
         ->where([
             ['ct_hoa_don.id_m','=',Auth::guard('merchant')->user()->id_m],
             ['trang_thai','=',$stt]
             ])
         ->select("id_hd")->get();
        $array_id = array();;
         foreach($id_list as $id)
         {
             $array_id[] = $id;
         }
        $data= json_decode(json_encode($array_id), true);
        $list_invoice =  DB::table('hoa_don')
       ->join('customer','customer.id_c','=','hoa_don.id_c')
        ->select('hoa_don.*','customer.ho_ten')
        ->whereIn('hoa_don.id',$data)->get();

       foreach($list_invoice as $item)
       {
           $ct =DB::table('ct_hoa_don')
            ->where([
                ['ct_hoa_don.id_m','=',Auth::guard('merchant')->user()->id_m],
                ['ct_hoa_don.id_hd','=',$item->id],
                ['trang_thai','=',$stt]
                ])
            ->first();
           $item->trang_thai = $controller->checkStatus( $ct->trang_thai);
           $item->ghi_chu_BH = $ct->ghi_chu_BH;
       }
       //return $list_invoice;
        return view('merchants.loadinvoice',['list_invoice' => $list_invoice])->render();
       }

   public function checkStatus($stt)
   {
       switch ($stt) {
           case 0:
               return 'Đang chờ xử lý';
               break;
           case 1:
           return 'Đang giao';
               break;
           case 2:
           return 'Hoàn tất';
               break;
           case 3:
           return 'Đã hủy';
           default:
           return '';
       }
   }

   public function showDetailInvoice(request $request){
       $detail_invoice =  DB::table('ct_hoa_don')
       ->join('hoa_don', 'ct_hoa_don.id_hd', '=', 'hoa_don.id')
       ->join('san_pham', 'ct_hoa_don.id_sp', '=', 'san_pham.id')
       ->where([
           ['hoa_don.id',$request->id_hd],
           ['ct_hoa_don.id_m',Auth::guard('merchant')->user()->id_m]
           ])
       ->select('ct_hoa_don.*', 'san_pham.*', 'hoa_don.tong_tien')
       ->get();
       $hd = Hoadon::where('id', $request->id_hd)->first();

        $total=0;
       foreach($detail_invoice as $item)
       {

           $total += $item->tong_tien;
       }
       return view('merchants.modalctdh-partial')->with(['detail_invoice'=>$detail_invoice,'hd'=>$hd,'total'=>$total]);

   }

   //Cập nhật trạng thái hóa đơn
   public  function updateSttInvoice($id_hd,$stt,$ghi_chu_m,Request $request){

      $trang_thai =DB::table('ct_hoa_don')
        ->where([
            ['id_hd',$id_hd],
            ['id_m',Auth::guard('merchant')->user()->id_m]
           ])->select('trang_thai')->first();
       $list_sp = DB::table('san_pham')
       ->join('ct_hoa_don','ct_hoa_don.id_sp', '=', 'san_pham.id')
       ->where([
               ['san_pham.id_m',Auth::guard('merchant')->user()->id_m],
               ['ct_hoa_don.id_hd',$id_hd]
           ])
       ->select('san_pham.id','ct_hoa_don.so_luong')->get();
       if($stt == 3)
       {

           if($trang_thai->trang_thai != '3')
           {

               foreach($list_sp as $item)
               {
                   $sp = \App\Models\Sanpham::find($item->id);
                   $sp->so_luong_ton_kho += $item->so_luong;
                   $sp->save();
               }
           }
       }
       else if($stt == 2)
        {

         DB::table('ct_hoa_don')
          ->where([
             ['id_hd',$id_hd],
             ['id_m',Auth::guard('merchant')->user()->id_m]
            ])
         ->update(['trang_thai'=>$stt,'ghi_chu_BH'=>$ghi_chu_m]);
            //Gửi email chứa link đánh giá sau khi hóa đơn hoàn tất
            $customer = DB::table('customer')
            ->join('hoa_don','hoa_don.id_c','=','customer.id_c')
            ->where('hoa_don.id',$id_hd)
            ->select('customer.*')->first();

            // return $customer->id_c;
          $thisCustomer = Customer::where('id_c',$customer->id_c)->first();
             $tonghd =0;
            $listCt =  CT_Hoadon::where('ct_hoa_don.id_hd',$id_hd)->where('ct_hoa_don.id_m',Auth::guard('merchant')->user()->id_m)->get();
            foreach($listCt as $item)
             {
                 $tonghd += $item->tong_tien;
             }
            $Merchant = Merchant::find(Auth::guard('merchant')->user()->id_m);
            //return $thisCustomer->email;
           // $this->sendEmail1($thisCustomer);
           Mail::to($thisCustomer->email)->send(new ratingMechant($id_hd,$listCt,$tonghd,$thisCustomer->id_c,$Merchant));

          return redirect('/merchant/danh-sach-don-hang')->with('success','Cập nhật trạng thái thành công');
        }
       else{
           if($trang_thai->trang_thai == '3')
           {
               foreach($list_sp as $item)
               {
                   $sp = \App\Models\Sanpham::find($item->id);
                   $sp->so_luong_ton_kho -= $item->so_luong;
                   $sp->save();
               }
           }
       }
        DB::table('ct_hoa_don')
       ->where([
            ['id_hd',$id_hd],
            ['id_m',Auth::guard('merchant')->user()->id_m]
           ])
       ->update(['trang_thai'=>$stt,'ghi_chu_BH'=>$ghi_chu_m]);

      return redirect('/merchant/danh-sach-don-hang')->with('success','Cập nhật trạng thái thành công');
   }

   public function  showFormPost(){

       $cates =  DB::table('danh_muc')->get();
       return view('merchants.formpost',['cates' => $cates]);
   }
   public function create_post(Request $request){

       $validator = Validator::make($request->all(), [
           'ten_san_pham' => 'required|max:100',
           'so_luong_ton_kho' => 'required|numeric',
           'don_gia' => 'required|numeric',
           'anh_dai_dien' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'xuat_xu'=>'required|max:30',
           'mo_ta'=>'required|max:1000'
       ],[
            'ten_san_pham.required'=>'Bạn chưa nhập tên sản phẩm',
            'ten_san_pham.max'=>'Tên sản phẩm quá dài',
            'so_luong_ton_kho.required'=>'Bạn chưa nhập số lượng của sản phẩm',
            'don_gia.required'=>'Bạn chưa nhập tên đơn giá sản phẩm',
            'so_luong_ton_kho.numeric'=>'Số lượng của sản phẩm phải là kí tự số',
            'don_gia.numeric'=>'Đơn giá sản phẩm phải là kí tự số',
            'anh_dai_dien.required'=>'Bạn chưa chọn ảnh sản phẩm',
            'anh_dai_dien.mimes'=>'Ảnh sản phẩm phải có đuôi là jpeg,png,jpg,gif,svg',
            'xuat_xu.required'=>'Bạn chưa nhập xuất xứ sản phẩm',
            'mo_ta.required'=>'Bạn chưa nhập mô tả sản phẩm',
            'xuat_xu.max'=>'Xuất xứ sản phẩm chứa tối đa 30 kí tự',
            'mo_ta.max'=>'Mô tả sản phẩm chứa tối đa 1000 kí tự',
       ]);

       if ($validator->fails()) {
           return redirect('merchant/dang-tin')
                       ->withErrors($validator)
                       ->withInput();
       }
       else{

           if(Auth::guard('merchant')->user()->so_luong_tin >0){
               $file = $request->file('anh_dai_dien');
               $name = $file->getClientOriginalName();
               $name_arr = explode(".",$name);
               $name_new = str_random(18).".".$name_arr[1];
               $file->move('uploads',$name_new);
               DB::table('san_pham')->insert(
                   [
                       'ten_san_pham' => $request->ten_san_pham,
                       'id_m'=>Auth::guard('merchant')->user()->id_m,
                       'so_luong_ton_kho' =>  $request->so_luong_ton_kho,
                       'ma_danh_muc' =>  $request->ma_danh_muc,
                       'don_gia' =>  $request->don_gia,
                       'anh_dai_dien' => 'uploads/'.$name_new,
                       'xuat_xu'=> $request->xuat_xu,
                       'mo_ta'=> $request->mo_ta,
                       'trang_thai'=>1,
                   ]
               );
               Merchant::where('id_m',Auth::guard('merchant')->user()->id_m)->update(['so_luong_tin'=>Auth::guard('merchant')->user()->so_luong_tin - 1]);
               Session::flash('success', 'Đã đăng tin');
               return redirect('merchant/dang-tin');

           }
           else{
               return redirect('merchant/dang-tin')
               ->with('error','Số lượng tin đăng đã hết. Vui lòng nạp để tiếp tục sử dụng')
               ->withInput();
           }


       }


       // DB::table('danh_muc')->insert(
       //     ['email' => 'john@example.com', 'votes' => 0]
       // );
   }
   //List bài đăng
   public function showListPost()
   {
       $list_post =   DB::table('san_pham')
       ->join('danh_muc','san_pham.ma_danh_muc','=','danh_muc.id')
       ->where('san_pham.id_m',Auth::guard('merchant')->user()->id_m)
       ->where('san_pham.trang_thai',1)
       ->select('san_pham.*','danh_muc.ten_danh_muc')->orderBy('so_luong_ton_kho','asc')
       ->get();
       $list_post_deal = DB::table('san_pham')
       ->join('ct_hoa_don','ct_hoa_don.id_sp','=','san_pham.id')
       ->join('danh_muc','san_pham.ma_danh_muc','=','danh_muc.id')
       ->where('san_pham.id_m',Auth::guard('merchant')->user()->id_m)
       ->where('ct_hoa_don.trang_thai','<',3)
       ->select('san_pham.id','san_pham.ten_san_pham','san_pham.anh_dai_dien','san_pham.so_luong_ton_kho','san_pham.don_gia','danh_muc.ten_danh_muc', DB::raw('SUM(ct_hoa_don.so_luong) as soluongdat'))
       ->groupBy('san_pham.id','san_pham.ten_san_pham','san_pham.anh_dai_dien','san_pham.so_luong_ton_kho','san_pham.don_gia','danh_muc.ten_danh_muc')->get();
       //return $list_post_deal;
       return view('merchants.postlist',['list_post' => $list_post,'list_post_deal'=>$list_post_deal]);
   }
   public function updateQuantityProduct(Request $request)
   {
       DB::table('san_pham')
       ->where('id',$request->id)
       ->update(['so_luong_ton_kho'=>$request->soluong]);
       Session::flash('success', 'Cập nhật số lượng thành công');
       return redirect('merchant/ton-kho');
   }
   public function DeleteProduct(request $request)
   {
       DB::table('san_pham')
       ->where('id',$request->id)
       ->update(['trang_thai'=>0]);
       return redirect('merchant/ton-kho');
   }
   public function buy_post_form()
   {
       $list_goitin = DB::table('goi_tin')->get();
      // return $list_goitin;
       return view('merchants.formbuypost',['list_goitin' => $list_goitin]);
   }


   //Danh sách lịch sử mua gói tin
   public function showListBuyPost()
   {

       $list_invoice_buy_post =  DB::table('phieu_thu')
       ->join('goi_tin','goi_tin.id','=','phieu_thu.id_goitin')
       ->where('phieu_thu.id_m',Auth::guard('merchant')->user()->id_m)
       ->select('phieu_thu.*','goi_tin.don_gia')
       ->get();
     // return $list_invoice_buy_post;
       return view('merchants.list_buy_post',['list_invoice_buy_post' => $list_invoice_buy_post]);
   }


   //Hiện view thống kê
   public function showStatistic()
   {

        return view('merchants.Statistic');
   }
   public function getStatistic($start_y,$end_y)
   {

    //     $validator = Validator::make($request->all(), [
    //        'tu_ngay' => 'required|date_format:d/m/Y',
    //        'den_ngay' => 'required|date_format:d/m/Y',

    //    ]);

    //    if ($validator->fails()) {
    //        return redirect('merchant/statistic')
    //                    ->withErrors($validator)
    //                    ->withInput();
    //    }
    //    else{


            $list_invoice =  DB::table('hoa_don')
            ->join('ct_hoa_don', 'ct_hoa_don.id_hd', '=', 'hoa_don.id')
            ->join('san_pham', 'ct_hoa_don.id_sp', '=', 'san_pham.id')
            ->join('customer', 'hoa_don.id_c', '=', 'customer.id_c')
            ->where([
                ['san_pham.id_m',Auth::guard('merchant')->user()->id_m],
                ['ct_hoa_don.trang_thai',2],
                ['hoa_don.created_at','>=',$start_y],
                ['hoa_don.created_at','<=',$end_y]
            ])
            ->select('hoa_don.*', 'customer.ho_ten')
            ->get();
              //return $list_invoice;
            $list_invoice_buy_post =  DB::table('phieu_thu')

                ->join('goi_tin','goi_tin.id','=','phieu_thu.id_goitin')
                ->where([
                    ['phieu_thu.id_m',Auth::guard('merchant')->user()->id_m],
                    ['phieu_thu.created_at','>=',$start_y],
                    ['phieu_thu.created_at','<=',$end_y]
                ])
                ->select('phieu_thu.*','goi_tin.don_gia')
                ->get();
               // return $list_invoice_buy_post;
             return view('merchants.LoadStatistic',['list_invoice' => $list_invoice,'list_invoice_buy_post'=>$list_invoice_buy_post]);
   }
}

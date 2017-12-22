<?php

namespace App\Http\Controllers\Merchants;

use App\Models\Merchant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mail;
use App\Mail\verifyToken;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'merchant/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:merchant');
    }

    public function showRegistrationForm()
    {
        return view('merchants.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator($data)
    {

        return Validator::make($data,  [
            'ten_dang_nhap' => 'required|string|max:25',
            'email' => 'required|string|email|max:255|unique:merchant',
            'password' => 'required|string|min:6|confirmed',
            'ho_ten' => 'required|string|max:255',
            'gioi_tinh'=> 'required',
            'sdt' => 'required|numeric|unique:merchant',
            'dia_chi' => 'required|string|max:255',
            'so_tk' => 'required|numeric',
            'so_cmnd' => 'required|numeric|unique:merchant',

        ],[
            'ten_dang_nhap.required'=>'Bạn chưa nhập tên đăng nhập',
            'ten_dang_nhap.string'=>'Tên đăng nhập phải là chữ viết liền không dấu',
            'ten_dang_nhap.max'=>'Tên đăng nhập quá dài',
            'ho_ten.required' => 'Bạn chưa nhập Họ tên',
            'ho_ten.max' => 'Họ tên quá dài. Vui lòng nhập lại',
            'email.unique' => 'Email này đã được sử dụng',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Định dạng email không đúng',
            'password.min' => 'Mật khẩu phải có 6 kí tự trở lên',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.confirmed' => 'Nhập lại mật khẩu không khớp',
            'sdt.max' => 'Số điện thoại quá dài',
            'sdt.min' => 'Số điện thoại quá ngắn',
            'sdt.required' => 'Bạn chưa nhập số điện thoại',
            'dia_chi.required' => 'Bạn chưa nhập địa chỉ.',
            'so_tk.required' => 'Bạn chưa số tài khoản.',
            'so_cmnd.required' => 'Bạn chưa số chứng minh thư.',
            'so_tk.numberic' => 'Số tài khoản phải là kí tự số.',
            'so_cmnd.numberic' => 'Số chứng minh thư phải là kí tự số .',
        ]);

    }
    protected function create(array $data)
    {
        Session::flash('success','Kích hoạt tài khoản qua email để hoàn tất đăng kí');
        $merchant = Merchant::create([
            'ten_dang_nhap' => $data['ten_dang_nhap'],
            'email' => $data['email'],
            'mat_khau' => $data['password'],
            'ho_ten' => $data['ho_ten'],
            'gioi_tinh'=>$data['gioi_tinh'],
            'sdt' => $data['sdt'],
            'dia_chi' => $data['dia_chi'],
            'so_tk' => $data['so_tk'],
            'so_cmnd' => $data['so_cmnd'],
            'so_luong_tin' => 0,
            'trang_thai'=>false,
            'anh_dai_dien'=>''
        ]);

        $thisMerchant = Merchant::findOrFail($merchant->id_m);
        $this->sendEmail($thisMerchant);
        return $merchant;
    }
     public function sendEmail($thisMerchant)
     {
         Mail::to($thisMerchant['email'])->send(new verifyToken($thisMerchant));
     }
    public function verifyEmailFirst()
    {
        return view('emails.merchant.verifyEmailFirst');
    }
    public function sendMailDone($email)
    {
        $merchant = Merchant::where(['email'=>$email,'trang_thai'=>0])->first();
        if($merchant)
        {
            Merchant::where('email',$email)->update(['trang_thai'=>1]);
            return redirect('/merchant/dang-nhap')->with('success','Kích hoạt thành công');
        }
        else{
            return redirect('/merchant/dang-nhap')->with("error",'Lỗi kích hoạt');

        }

    }
    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
     protected function guard()
     {
         return Auth::guard('merchant');
     }
}

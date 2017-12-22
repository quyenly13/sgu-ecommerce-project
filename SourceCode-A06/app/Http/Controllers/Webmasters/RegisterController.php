<?php

namespace App\Http\Controllers\Webmasters;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Models\Quantrivien;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mail;
use App\Mail\verifyTokenWebmaster;
use Session;
use RedirectsUsers;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'webmaster/quanliwebmaster';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('merchant_guest');
    }
    protected function registered(Request $request, $user)
    {
        //
    }
    public function ThemMoi()
    {
        return view('webmaster.themwebmaster');
    }
    function redirectPath()
    {
      return 'webmaster/quanliwebmaster';
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
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
            'ten_dang_nhap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:quan_tri_vien',
            'password' => 'required|string|min:6|confirmed',
        ]);

    }


    protected function create(array $data)
    {
        Session::flash('status','Xác nhận tài khoản qua email để hoàn tất đăng kí');
        $webmaster = Quantrivien::create([
            'ten_dang_nhap' => $data['ten_dang_nhap'],
            'email' => $data['email'],
            'mat_khau' => $data['password'],
            'trang_thai'=>false,
        ]);

        $thisWebmaster = Quantrivien::findOrFail($webmaster->id);
        $this->sendEmail($thisWebmaster);
        return $webmaster;
    }
     public function sendEmail($thisWebmaster)
     {
         Mail::to($thisWebmaster['email'])->send(new verifyTokenWebmaster($thisWebmaster));
     }
    public function verifyEmailFirst()
    {
        return view('emails.webmaster.verifyEmailFirst');
    }
    public function sendMailDone($email)
    {
        $webmaster = Quantrivien::where(['email'=>$email,'trang_thai'=>0])->first();
        if($webmaster )
        {
            Quantrivien::where('email',$email)->update(['trang_thai'=>1]);
            return redirect('webmaster/login');
            session()->flash('status','Đã Xác Nhận Thành Công !!!!!');
        }
        else{
            return redirect('webmaster/login');
            session()->flash('status','Lỗi xác nhận');
        }

    }
    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
     protected function guard()
     {
         return Auth::guard('webmaster');
     }
}

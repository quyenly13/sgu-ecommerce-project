<?php

namespace App\Http\Controllers\Merchants;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Taikhoanbikhoa;
class LoginController extends Controller
{
    use AuthenticatesUsers;

     //   protected $guard ='merchant';
    public function __construct()
    {
        $this->middleware('guest:merchant');
    }

    public function showLoginForm()
    {
        return view('merchants.login');
    }
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'mat_khau' => 'required|string',
        ]);

    }
      public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

         $merchant = Merchant::where(['email'=>$request->email])->first();
      // return $merchant;
        if($merchant->trang_thai == -1)
        {
        
            return redirect('/merchant/dang-nhap')
            ->with("error","Tài khoản đã bị khóa. Vui lòng liên hệ Quản trị viên để biết thêm chi tiết");
        }
        elseif($merchant->trang_thai == 0)
        {
             return redirect('/merchant/dang-nhap')
            ->with("error","Tài khoản chưa được kích hoạt. Vui lòng vào email đã đăng kí để kích hoạt");
        }
        else{
            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );

    }
    protected function sendLoginResponse(Request $request)
    {

        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

                          Auth::guard('customer')->logout();
                            Auth::guard('webmaster')->logout();

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended('/merchant');

    }

    protected function credentials(Request $request)
    {
        //return $request->only($this->username(),'mat_khau');
        $arr =['email'=>$request->email,'mat_khau'=>$request->mat_khau,'trang_thai'=>1];
        return $arr;
    }
    protected function guard()
    {
      return Auth::guard('merchant');
    }
    public function logout()
    {
        Auth::guard('merchant')->logout();

        return redirect('/home');
    }

}

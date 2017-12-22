<?php

namespace App\Http\Controllers\Merchants;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Merchant;
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
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }
    protected function sendLoginResponse(Request $request)
    {
      //  $merchant = Merchant::where(['email'=>$request->email])->first();
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

                                  Auth::guard('customer')->logout();
                                    Auth::guard('merchant')->logout();

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

        return redirect('/');
    }

}

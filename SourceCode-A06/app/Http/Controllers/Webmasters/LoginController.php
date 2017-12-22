<?php

namespace App\Http\Controllers\Webmasters;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Quantrivien;
class LoginController extends Controller
{
    use AuthenticatesUsers;

     //   protected $guard ='merchant';
    public function __construct()
    {
        $this->middleware('webmaster_guest');
    }

    public function showLoginForm()
    {
        return view('webmaster.login');
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

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended('/webmaster');
    }

    protected function credentials(Request $request)
    {
        //return $request->only($this->username(),'mat_khau');
        $arr =['email'=>$request->email,'mat_khau'=>$request->mat_khau,'trang_thai'=>1];
        return $arr;
    }
    protected function guard()
    {
      return Auth::guard('webmaster');
    }
    public function logout()
    {
        Auth::guard('webmaster')->logout();

        return redirect('/');
    }
    protected function sendFailedLoginResponse(Request $request)
{

    $user = Quantrivien::where($this->username(), $request->input('email'))->where('mat_khau',$request->mat_khau)->first();


    if ($user && !$user->trang_thai) {
        $errorMessage = 'Bạn chưa kích hoạt tài khoản'; // you can use trans here too
    }
    else {
        $errorMessage = trans('auth.failed');
    }

    $errors = [$this->username() => $errorMessage];

    if ($request->expectsJson()) {
        return response()->json($errors, 422);
    }

    return redirect()->back()
        ->withInput($request->only($this->username(), 'remember'))
        ->withErrors($errors);
}


}

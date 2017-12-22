<?php

namespace App\Http\Controllers\Customer\auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Validator, Session;
use Illuminate\Support\MessageBag;
use URL;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    // public function __construct()
    // {
    //     $this->middleware('guest:customer');
    // }

    public function showLogin()
    {
        Session::put('url.intended',URL::previous());
        return view('customer.pages.auth.login');
    }

    public function postLogin(Request $request) {

        // dd($request->all());
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'email.email' => 'Định dạng email không đúng'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        // dd($validator);

        if( $validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            $login = ['email'=>$request->email,'mat_khau'=>$request->password];


                               $c = Customer::where(['email'=>$email])->first();
                               if($c->is_active == 0)
                               {
                                return redirect()->back()->with('errorDN','Lỗi');
                               }

            // $user = DB::table('customer')->where('email', $email)->value('password');
            // dd($user);

            // dd(\Hash::make($password));

            if(Auth::guard('customer')->attempt($login, $request->has('remember'))) {

                  Auth::guard('merchant')->logout();
                    Auth::guard('webmaster')->logout();
                return redirect()->intended(Session::get('url.intended'));

            } else {
                $error = new MessageBag(['errorLogin' => 'Email hoặc mật khẩu không đúng.'] ) ;
                return redirect()->back()->withInput()->withErrors($error);
            }
        }
    }

    public function getLogout() {
        Auth::guard('customer')->logout();
        Session::flush();
    	return redirect('/dang-nhap');
    }


}

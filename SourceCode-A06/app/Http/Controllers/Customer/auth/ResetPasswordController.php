<?php

namespace App\Http\Controllers\Customer\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Query\Builder;
use Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function showReset() {
        return view('customer.pages.auth.reset');
    }

    public function showResetForm(Request $request) {
        return view('customer.pages.auth.reset')
            ->with(['email' => $request->email]
            );
    }
 
 
    //defining which guard to use in our case, it's the admin guard
    protected function guard()
    {
        return Auth::guard('customer');
    }
 
    //defining our password broker function
    protected function broker() {
        return Password::broker('customer');
    }

    public function resetPassword(Request $request) {
        $customer = Customer::where('email', $request->email)->first();
        // dd($customer);
        $rules = [
            'password' => 'required|string|min:6|confirmed',

        ];
        $messages = [
            'password.min' => 'Mật khẩu phải dài tối thiểu 6 kí tự',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.confirmed' => 'Nhập lại mật khẩu sai',

        ];

         $validator = Validator::make($request->all(), $rules, $messages);

         if( $validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }  else {
            $customer->password = Hash::make($request->input('password'));
            $customer->save();
            return redirect('/dang-nhap')->with('status', 'Bạn đã thay đổi mật khẩu thành công');
        }
    }
}

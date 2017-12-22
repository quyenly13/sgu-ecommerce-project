<?php

namespace App\Http\Controllers\Merchants;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\Merchant;
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
    protected $redirectTo = 'merchant/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:merchant');
    }

    
    public function showResetForm(Request $request) {
        return view('merchants.passwords.reset')
            ->with(['email' => $request->email]
            );
    }

    public function resetPassword(Request $request) {
        $merchant = Merchant::where('email', $request->email)->first();
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
            $merchant->mat_khau = $request->input('password');
            $merchant->save();
            return redirect('/merchant/dang-nhap')->with('success', 'Bạn đã thay đổi mật khẩu thành công');
        }
    }

}

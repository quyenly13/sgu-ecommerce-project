<?php

namespace App\Http\Controllers\Merchants;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Password;
use App\Models\Merchant;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:merchant');
    }

    public function showForgot () {
        return view('merchants.passwords.email');
    }
    protected function guard()
    {
        return Auth::guard('merchant');
    }

    protected function broker() {
        return Password::broker('merchants');
    }
}

<?php

namespace App\Http\Controllers\Customer\auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Password;
use App\Models\Customer;
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
        $this->middleware('guest:customer');
    }

    public function showForgot () {
        return view('customer.pages.auth.forgot');
    }
    protected function guard()
    {
        return Auth::guard('customer');
    }

    protected function broker() {
        return Password::broker('customer');
    }
}

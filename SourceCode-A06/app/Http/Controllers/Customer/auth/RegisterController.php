<?php

namespace App\Http\Controllers\Customer\auth;

use App\Http\Controllers\Controller;
use App\Mail\CustomerRegister;
use App\Models\Customer;
use Faker\Factory;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function showRegister() {
        return view('customer.pages.auth.register');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        $email = Customer::where('email', $request->input('email'))->count();
        if($email > 0){
             return redirect()->back()->withInput()->withErrors([ 'emailExist' => 'Email này đã được sử dụng. Vui lòng kiểm tra lại!']);
        } else {
            $this->validator($request->all())->validate();
            event(new Registered($user = $this->create($request->all())));
          
            $this->sendEmail($user);


            return redirect($this->redirectPath())->with('status', 'Bạn đã đăng kí thành công.');
        }
    }

    /**
     * registered event (send email)
     * @param Request $request
     * @param $user
     */
    // protected function registered(Request $request, $user)
    // {

    //     Mail::to($user->email)
    //         ->send(new CustomerRegister($user));
    // }
    // protected function registered( $user)
    // {

    //     // Mail::to($user->email)
    //     //     ->send(new CustomerRegister($user));
    //     $user->notify(new CustomerRegister())
    // }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ho_ten' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:customer',
            'password' => 'required|string|min:6|confirmed',
            'ten_dang_nhap' => 'required|string',
            'sdt' => 'required|string|min:10|max:12',
            'dia_chi' => 'required|string',
        ], [
            'ho_ten.required' => 'Bạn chưa nhập Họ tên',
            'ho_ten.max' => 'Họ tên quá dài. Vui lòng nhập lại',
            'email.unique' => 'Email này đã được sử dụng',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Định dạng email không đúng',
            'password.min' => 'Mật khẩu quá ngắn',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.confirmed' => 'Nhập lại mật khẩu sai',
            'sdt.max' => 'Số điện thoại quá dài',
            'sdt.min' => 'Số điện thoại quá ngắn',
            'sdt.required' => 'Bạn chưa nhập số điện thoại',
            'dia_chi.required' => 'Bạn chưa nhập địa chỉ.',
        ]);
    }

    public function sendEmail($thisCustomer)
    {
        Mail::to($thisCustomer['email'])->send(new CustomerRegister($thisCustomer));
    }

    public function sendMailDone($email)
    {
        $c = Customer::where(['email'=>$email,'is_active'=>0])->first();
        if($c)
        {
            Customer::where('email',$email)->update(['is_active'=>1]);
            return redirect('/dang-nhap')->with('success','Kích hoạt thành công');
        }
        else{
            return redirect('/dang-nhap')->with("error",'Lỗi kích hoạt! ');

        }

    }

    protected function create(array $data)
    {


        // email_active,
        return  Customer::create([
            'ho_ten' => $data['ho_ten'],
            'email' => $data['email'],
            'gioi_tinh' => $data['sex'],
            'ten_dang_nhap' => $data['ten_dang_nhap'],
            'password' => bcrypt($data['password']),
            'sdt' => $data['sdt'],
            'dia_chi' => $data['dia_chi'],
        ]);

    }

    protected function redirectTo()
    {
        return 'dang-nhap';
    }


}

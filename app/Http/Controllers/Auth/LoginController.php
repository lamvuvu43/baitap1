<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function hk_login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $message = [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ];

        $arr = [
            'email' => $request['email'],
            'password' => $request['password']
        ];

        $vali = Validator::make($request->all(), $rules, $message);

        if ($vali->fails()) {
            return redirect()->back()->withErrors($vali)->withInput();
        } else {
            if (Auth::attempt($arr)) {
                return redirect()->route('ho_khau');
            } else {
                return redirect()->back()->with('error_login', 'Email hoặc mật khẩu không đúng');
            }
        }
    }

    public function nk_login(Request $request)
    {
        
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $message = [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ];

        $vali = Validator::make($request->all(), $rules, $message);
        $arr = [
            'user' => $request['email'],
            'password' => $request['password']
        ];

        if ($vali->fails()) {
            return redirect()->back()->withErrors($vali)->withInput();
        } else {
            // dd(Auth::guard('nhan_khau_login'));
            if (Auth::guard('nhan_khau_login')->attempt($arr)) {
                // dd(Auth::guard('nhan_khau_login'));
                return redirect()->route('list_nhan_khau_by_hk');
            } else {
                return redirect()->back()->with('error_login', 'Email hoặc mật khẩu không đúng');
            }
        }
    }
}

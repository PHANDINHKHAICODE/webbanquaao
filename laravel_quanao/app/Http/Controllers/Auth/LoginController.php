<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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

     public function LoginGD(){
        return view('auth.login');
     }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
       
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        $remember = $request->filled('remember');

        Log::info('Login attempt', ['email' => $credentials['email'], 'ip' => $request->ip()]);

        $attempt = FacadesAuth::attempt($credentials, $remember);

        Log::info('Login result', ['email' => $credentials['email'], 'result' => $attempt, 'session_id' => session()->getId()]);

        if($attempt){
            if(FacadesAuth::user()->is_admin==1){
                return redirect()->route('adminhome');
            }else{
                return redirect()->route('home');
            }
        }

        return redirect()->route('login')->withErrors(['email' => 'Thông tin đăng nhập không đúng hoặc mật khẩu sai.']);
    }

    public function logout()
    {
        Auth::logout();
        return  redirect()->route('home');
    }
}

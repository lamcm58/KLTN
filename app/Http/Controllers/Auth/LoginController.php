<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = '/';

    /**
     * Where to redirect users after logout
     *
     * @var string
     */
    protected $redirectAfterLogout = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(LoginRequest $request)
    {
        try {
            $login = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::attempt($login))
            {
                return redirect('/');
            }
            else {
                return redirect()->back()->with(['err' => 'Thông tin đăng nhập không hợp lệ, vui lòng đăng nhập lại.']);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function logoutAdmin()
    {
        Auth::logout();
        Session::flush();
        session_write_close();

        return redirect($this->redirectAfterLogout);
    }
}

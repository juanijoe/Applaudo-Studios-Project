<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:candidate')->except('logout');
        $this->middleware('guest:company')->except('logout');
        $this->middleware('guest:recruiter')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(LoginRequest $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showCandidateLoginForm()
    {
        return view('auth.login', ['url' => 'candidate']);
    }
    public function candidateLogin(LoginRequest $request)
    {
        if (Auth::guard('candidate')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/candidate');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function showCompanyLoginForm()
    {
        return view('auth.login', ['url' => 'company']);
    }
    public function companyLogin(LoginRequest $request)
    {
        if (Auth::guard('company')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/company');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function showRecruiterLoginForm()
    {
        return view('auth.login', ['url' => 'recruiter']);
    }
    public function recruiterLogin(LoginRequest $request)
    {
        if (Auth::guard('recruiter')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/recruiter');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}

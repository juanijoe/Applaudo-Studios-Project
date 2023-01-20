<?php

namespace App\Http\Controllers\Auth;


use App\Models\Admin;
use App\Models\Company;
use App\Models\Candidate;
use App\Models\Recruiter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:candidate');
        $this->middleware('guest:company');
        $this->middleware('guest:recruiter');
    }

    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    public function showCandidateRegisterForm()
    {
        return view('auth.register', ['url' => 'candidate']);
    }
    public function showCompanyRegisterForm()
    {
        return view('auth.register', ['url' => 'company']);
    }
    public function showRecruiterRegisterForm()
    {
        return view('auth.register', ['url' => 'recruiter']);
    }


    protected function createAdmin(CreateUserRequest $request)
    {
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admin');
    }

    protected function createCandidate(CreateUserRequest $request)
    {
        Candidate::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/candidate');
    }
    protected function createCompany(CreateUserRequest $request)
    {
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/company');
    }
    protected function createRecruiter(CreateUserRequest $request)
    {
        Recruiter::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/recruiter');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Company;
use App\Models\Position;
use Illuminate\Http\Request;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    public function home(Request $request)
    {
        $user = $request->user('company');

        if ($user == null) {
            return redirect('/login/company');
        }
        $company_open_positions = Position::where('company_id', $user->id)
            ->where('position_status', 1)
            ->get();
        $url = 'company';
        return view('company.home', compact('user', 'url', 'company_open_positions'));
    }

    public function profile()
    {
        return view('company.profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate();
        $url = 'company';
        return view('company.index', compact('companies', 'url'))
            ->with('i', (request()->input('page', 1) - 1) * $companies->perPage());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);

        return view('company.show', compact('company'));
    }

    public function create()
    {
        $company = new Company();
        return view('company.create', compact('company'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        return view('company.edit', compact('company'));
    }
    public function store(CreateUserRequest $request)
    {
        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserRequest $request, Company $company)
    {
        $company->update($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $company = Company::find($id)->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }
}

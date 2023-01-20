<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Position;
use App\Models\Recruiter;
use Illuminate\Http\Request;

/**
 * Class RecruiterController
 * @package App\Http\Controllers
 */
class RecruiterController extends Controller
{
    public function home(Request $request)
    {
        $user = $request->user('recruiter');

        if ($user == null) {
            return redirect('/login/recruiter');
        }

        $recruiter_positions_in_charge = Position::where('recruiter_id', $user->id)
            ->where('position_status', 1)
            ->get();
        return view('recruiter.home', compact('user', 'recruiter_positions_in_charge'));
    }

    public function profile()
    {
        return view('recruiter.profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruiters = Recruiter::paginate();

        return view('recruiter.index', compact('recruiters'))
            ->with('i', (request()->input('page', 1) - 1) * $recruiters->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recruiter = new Recruiter();
        return view('recruiter.create', compact('recruiter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $recruiter = Recruiter::create($request->all());

        return redirect()->route('recruiters.index')
            ->with('success', 'Recruiter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recruiter = Recruiter::find($id);

        return view('recruiter.show', compact('recruiter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recruiter = Recruiter::find($id);

        return view('recruiter.edit', compact('recruiter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Recruiter $recruiter
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserRequest $request, Recruiter $recruiter)
    {
        $recruiter->update($request->all());

        return redirect()->route('recruiters.index')
            ->with('success', 'Recruiter updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $recruiter = Recruiter::find($id)->delete();

        return redirect()->route('recruiters.index')
            ->with('success', 'Recruiter deleted successfully');
    }
}

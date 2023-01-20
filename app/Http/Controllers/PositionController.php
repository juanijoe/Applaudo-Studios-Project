<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePositionRequest;
use App\Models\Company;
use App\Models\Position;
use App\Models\Recruiter;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::paginate();

        return view('position.index', compact('positions'))
            ->with('i', (request()->input('page', 1) - 1) * $positions->perPage());
    }
    public function show($position_id, Request $request)
    {
        $url = array_keys($request->query())[0] ?? null;
        $position = Position::find($position_id);
        $company = Company::where('id', $position->company_id)
            ->first();
        return view('position.show', compact('position', 'company', 'url'));
    }

    public function edit($position_id)
    {
        $position = Position::find($position_id);
        $recruiters = Recruiter::all();

        return view('position.edit', compact('position', 'recruiters'));
    }

    public function create()
    {
        $position = new Position();
        $recruiters = Recruiter::all();
        return view('position.create', compact('position', 'recruiters'));
    }

    public function store(CreatePositionRequest $request)
    {
        $position = Position::create($request->all());

        return redirect()->route('company.home')
            ->with('success', 'Position created successfully.');
    }

    public function update(CreatePositionRequest $request, Position $position)
    {
        //request()->validate(Position::$rules);

        $position->update($request->all());

        return redirect()->route('company.home')
            ->with('success', 'Position updated successfully');
    }
}

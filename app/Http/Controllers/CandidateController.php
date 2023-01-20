<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Postulation;
use Illuminate\Http\Request;
use App\Http\Requests\CVFileRequest;
use App\Http\Requests\CreateUserRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class CandidateController
 * @package App\Http\Controllers
 */
class CandidateController extends Controller
{
    public function home(Request $request)
    {
        $user = $request->user('candidate') ?? null;
        $positions = Position::where('position_status', 1)->get();
        if ($user != null) {
            $candidate_postulations = Postulation::where('candidate_id', $user->id)
                ->get()
                ->pluck('position_id')
                ->all();
            return view('candidate.home', compact('user', 'positions', 'candidate_postulations'));
        }
        return view('candidate.home', compact('user', 'positions'));
        //return Response::view('candidate.home')->compact('user', 'positions');
    }

    public function profile(Request $request)
    {
        $user = $request->user('candidate');
        $file = Cv::where('candidate_id', $request->user('candidate')->id)
            ->first();
        return view('candidate.profile', compact('user', 'file'));
    }

    public function editProfile(CVFileRequest $request)
    {
        $cvfile_name = str_replace(' ', '_', $request->user('candidate')->name) . '_cv_' . date("Y-m-d") . '-' . time() . '.pdf';
        $filePath = $request->file->storeAs('', $cvfile_name);
        if ($file = Cv::where('candidate_id', $request->user('candidate')->id)->first()) {
            Storage::disk('public')->delete($file->cvfile_name);
            $file->update([
                'cvfile_name' => $cvfile_name,
            ]);
            return back()
                ->with('success', 'CV File Uploaded Successful')
                ->with('file', $file);
        }
        $file = Cv::create([
            'candidate_id' => $request->user('candidate')->id,
            'candidate_name' => $request->user('candidate')->name,
            'cvfile_name' => $cvfile_name,
        ]);

        return back()
            ->with('success', 'CV File Uploaded Successful')
            ->with('file', $file);
    }

    public function uploadProfile()
    {
        return view('candidate.upload-profile');
    }

    public function delete(Request $request)
    {
        $user = $request->user('candidate');
        $cvfile_name = Cv::where('candidate_id', $user->id)->first()->cvfile_name;
        return view('candidate.delete', compact('user', 'cvfile_name'));
    }

    public function deleteProfile(Request $request)
    {
        $user = $request->user('candidate');
        $cvfile_name = $request->cvfile_name;
        $file = Cv::where('cvfile_name', 'like', $cvfile_name)->first();
        Storage::disk('public')->delete($cvfile_name);
        $file->delete();
        return redirect()->route('candidate.profile')
            ->with('message', 'Cv profile deleted!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::paginate();

        return view('candidate.index', compact('candidates'))
            ->with('i', (request()->input('page', 1) - 1) * $candidates->perPage());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidate::find($id);

        return view('candidate.show', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::find($id);

        return view('candidate.edit', compact('candidate'));
    }

    public function create()
    {
        $candidate = new Candidate();
        return view('candidate.create', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUserRequest $request, Candidate $candidate)
    {
        $candidate->update($request->all());

        return redirect()->route('candidates.index')
            ->with('success', 'Candidate updated successfully');
    }

    public function store(CreateUserRequest $request)
    {
        $candidate = Candidate::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('candidates.index')
            ->with('success', 'Candidate created successfully.');
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $candidate = Candidate::find($id)->delete();

        return redirect()->route('candidates.index')
            ->with('success', 'Candidate deleted successfully');
    }
}

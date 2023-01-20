<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Report;
use App\Models\Status;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Postulation;
use Illuminate\Http\Request;
use App\Services\MailService;
use App\Events\ReportGenerated;
use App\Http\Requests\ShowReportRequest;
use App\Http\Requests\CreateEmailRequest;
use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\CreatePostulationRequest;

class PostulationController extends Controller
{
    public function index()
    {
        $postulations = Postulation::paginate();

        return view('postulation.index', compact('postulations'))
            ->with('i', (request()->input('page', 1) - 1) * $postulations->perPage());
    }
    public function show($position_id)
    {
        $position = Position::where('id', $position_id)
            ->where('position_status', 1)
            ->first();
        $postulations = Postulation::where('position_id', $position_id)
            ->get();
        $statuses = Status::all();
        return view('postulation.status_monitor', compact('position', 'postulations', 'statuses'));
    }

    public function showProfile($candidate_id)
    {
        $candidate = Candidate::find($candidate_id);
        return view('postulation.show_profile', compact('candidate'));
    }

    public function store(CreatePostulationRequest $request)
    {
        $postulation = Postulation::create($request->all());

        return back()->with('success', 'Postulation has been sent')
            ->with('position_id', $request->position_id);
    }

    public function received(Request $request, $postulation_id)
    {
        $postulation = Postulation::find($postulation_id);
        $previous_status = $postulation->status->status;
        $postulation->update(['status_id' => $request->status]);

        return back()->with('success', 'Postulation status has been changed!')
            ->with('postulation_update', $postulation_id)
            ->with('previous_status', $previous_status);
    }

    public function generateReport($postulation_id)
    {
        $postulation = Postulation::find($postulation_id);
        return view('postulation.report', compact('postulation'));
    }

    public function reportStore(CreateReportRequest $request)
    {
        $report = Report::create($request->all());

        ReportGenerated::dispatch($report);

        return back()->with('success', 'Report has been created')
            ->with('report', $report->id);
    }

    public function showReport(ShowReportRequest $request)
    {
        $reports = Report::where('candidate_id', $request->candidate_id)
            ->where('position_id', $request->position_id)
            ->get();
        return view('postulation.show_reports', compact('reports'));
    }

    public function generateEmail($postulation_id)
    {
        $postulation = Postulation::find($postulation_id);
        return view('postulation.email', compact('postulation'));
    }

    public function sendEmail(CreateEmailRequest $request, MailService $mailer)
    {
        $email = new Email($request->all());

        $mailer->send($email);

        return back()->with('success', 'Email has been sent to candidate')
            ->with('email', $email);
    }
}

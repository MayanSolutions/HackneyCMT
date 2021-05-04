<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyResponses;
use App\Models\clients;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Repositories\AssessmentRepository;
use Illuminate\Support\Facades\Auth;


class SurveyReviewController extends Controller
{
    private $assessmentRepository;

    public function __construct(AssessmentRepository $assessmentRepository)
    {
        $this->assessmentRepository = $assessmentRepository;
    }

    public function index(Request $request)
    {

        $surveys = Survey::with(['clients', 'review'])->whereBetween('created_at', [now()->subDays(330), now()])
        ->where([
            [function ($query) use ($request) {
                if (($survey = $request->survey)) {
                    $query
                    ->orWhere('officer', 'LIKE', '%' . $survey . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $survey . '%')->get();
                }
            }]
        ])
        ->paginate(5);

        $historicalSurveys = Survey::with(['clients', 'review'])->where('created_at', '<', now()->subDays(330))->where([
            [function ($query) use ($request) {
                if (($survey = $request->survey)) {
                    $query
                    ->orWhere('officer', 'LIKE', '%' . $survey . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $survey . '%')->get();
                }
            }]
        ])
        ->paginate(5);

        return view('assessments.index', compact('surveys','historicalSurveys'));
    }

    public function show($id)
    {
        abort_if(Gate::denies('review_access'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $submissionInfo = Survey::where('id', $id)->first();
        $client = clients::where('id', $submissionInfo->client_id)->first();
        $liaisonOfficer = User::where('id', $client->user_id)->first();

        $progression = SurveyResponses::where('survey_id', $id);

        if($progression->count('assessment_result') > 0)
        {
        $status = $progression->count('assessment_result') / $progression->count() * 100;
        }
        else
        {
            $status = 0;
        }

        $assessments = $this->assessmentRepository->assessment($id);

        return view('assessments.show', compact('submissionInfo','client','liaisonOfficer', 'assessments', 'status'));
    }

    public function edit($id)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $assessment = $this->assessmentRepository->response($id);

        return view('assessments.edit', compact('assessment'));
    }

    public function update(Request $request, $id)
    {
        $liaison_officer = Auth::user()->name;
        $redirect = SurveyResponses::where('id', $id)->first();

        $this->validate($request, [
            'assessment_result' => 'required',
            'comments' => 'required',
            ]);

            $grade = SurveyResponses::find($id);
            $grade->update([
                'assessment_result' => $request->assessment_result,
                'comments' => $request->comments,
                'liaison_officer' => $liaison_officer,
            ]);


            return redirect('/assessments/'.$redirect->survey_id)->withSuccessMessage('Requirement graded');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        return redirect()->route('clients.index')->withSuccessMessage('TMO profile deleted');
    }

}

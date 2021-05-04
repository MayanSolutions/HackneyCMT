<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Survey;
use App\Models\clients;
use App\Models\SurveyResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SurveyController extends Controller
{

    public function show(Review $review, $slug)
    {
        $clients = clients::get();
        $review->load('questions.answers');

        return view('surveys.show', compact('review', 'clients'));
    }

    public function store(Review $review)
    {
        if($file = request()->file('file_name'))
        {
            $name = $file->getClientOriginalName();
            $file->move('digitaluploads', $name);
        }
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'responses.*.commentary' => '',
            'responses.*.file_name' => '',
            'survey.client_id' => 'required',
            'survey.officer' => 'required',
        ]);

        $survey = $review->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        return view('surveys.complete');

    }
}

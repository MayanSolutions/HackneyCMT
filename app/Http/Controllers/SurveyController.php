<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\clients;
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
        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'survey.client_id' => 'required',
            'survey.officer' => 'required',
        ]);

        $survey = $review->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        return view('surveys.complete');

    }
}

<?php

namespace App\Repositories;
use App\Models\Survey;
use Illuminate\Support\Facades\DB;


class AssessmentRepository
{
    
    public function assessment($id)
    {
       return DB::table('surveys')
        ->join('survey_responses', 'surveys.id', '=', 'survey_responses.survey_id',)
        ->join('questions', 'survey_responses.question_id', '=', 'questions.id')
        ->join('answers', 'survey_responses.answer_id', '=', 'answers.id')
        ->join('clients', 'surveys.client_id', '=', 'clients.id')
        ->where('surveys.id', $id)
        ->select(
            'surveys.officer',
            'surveys.created_at',
            'questions.question',
            'answers.answer',
            'clients.client_organisation',
            'survey_responses.id',
            'survey_responses.liaison_officer',
            'survey_responses.assessment_result',
            'survey_responses.comments',
        )->paginate(1);
    }

    public function response($id)
    {
        return DB::table('surveys')
        ->join('survey_responses', 'surveys.id', '=', 'survey_responses.survey_id',)
        ->join('questions', 'survey_responses.question_id', '=', 'questions.id')
        ->join('answers', 'survey_responses.answer_id', '=', 'answers.id')
        ->join('clients', 'surveys.client_id', '=', 'clients.id')
        ->where('survey_responses.id', $id)
        ->select(
            'surveys.officer',
            'surveys.created_at',
            'questions.question',
            'answers.answer',
            'clients.client_organisation',
            'survey_responses.id',
            'survey_responses.liaison_officer',
            'survey_responses.assessment_result',
            'survey_responses.comments',
        )->first();
    }
}

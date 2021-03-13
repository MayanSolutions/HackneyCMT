<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Question;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function create(Review $review)
    {
        abort_if(Gate::denies('can_create_digi_reviews'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');
        return view('questions.create', compact('review'));
    }

    public function store(Review $review)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',
        ]);

        $question = $review->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/reviews/'.$review->id)->withSuccessMessage('Requirement created');
    }

    public function destroy(Review $review, Question $question)
    {
        abort_if(Gate::denies('can_delete_digi_reviews'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $question->answers()->delete();
        $question->delete();

        return redirect($review->path())->withSuccessMessage('Requirement deleted');
    }
}

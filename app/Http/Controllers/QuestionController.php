<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Question;

class QuestionController extends Controller
{
    public function create(Review $review)
    {

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

        return redirect('/reviews/'.$review->id);
    }

    public function destroy(Review $review, Question $question)
    {
        $question->answers()->delete();
        $question->delete();

        return redirect($review->path());
    }
}

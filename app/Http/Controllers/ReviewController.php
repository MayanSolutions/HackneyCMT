<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{

    public function create()
    {

        return view('reviews.create');
    }

    public function store()
    {

        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
            'version' => 'required',
        ]);

        $review = Review::create($data);

        return redirect('/reviews/'.$review->id);

    }

    public function show(Review $review)
    {

        $review->load('questions.answers');

        return view('reviews.show', compact ('review'));
    }


}

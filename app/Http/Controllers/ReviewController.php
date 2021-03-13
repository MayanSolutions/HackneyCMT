<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{

    public function create()
    {
        abort_if(Gate::denies('can_create_digi_reviews'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

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

        return redirect('/reviews/'.$review->id)->withSuccessMessage('Review created');

    }

    public function show(Review $review)
    {
        $review->load('questions.answers');

        return view('reviews.show', compact ('review'));
    }


}

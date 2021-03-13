<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ReviewHomeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('can_view_digi_reviews'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');
        $reviews = Review::get();
        return view('reviewslist.index', compact('reviews'));

    }
}

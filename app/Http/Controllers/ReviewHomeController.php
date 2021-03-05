<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewHomeController extends Controller
{
    public function index()
    {
        $reviews = Review::get();

        return view('reviewslist.index', compact('reviews'));

    }
}

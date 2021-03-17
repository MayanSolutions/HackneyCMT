<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ReviewHomeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('can_view_digi_reviews'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');
        $reviews = Review::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($review = $request->review)) {
                    $query->orWhere('title', 'LIKE', '%' . $review . '%')
                    ->orWhere('purpose', 'LIKE', '%' . $review . '%')
                    ->orWhere('version', 'LIKE', '%' . $review . '%')
                    ->get();
                }
            }]
        ])
        ->orderBy('id', 'desc')
        ->paginate(4);
        return view('reviewslist.index', compact('reviews'));

    }
}

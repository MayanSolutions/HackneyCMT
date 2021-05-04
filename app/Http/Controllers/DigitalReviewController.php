<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class DigitalReviewController extends Controller
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

        return view('digitalreviews.index', compact('reviews'));
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('can_delete_digi_reviews'), Response::HTTP_FORBIDDEN, 'Insufficient Permissions');

        $reviews = Review::find($id);

        if($reviews->surveys()->count() > 0)
        {
            Alert::toast('This review cannot not be deleted because there are existing submissions relating to this digital review','warning');
            return back();
        }
        else
        {
            $reviews->questions()->delete();
            $reviews->delete();
            return redirect()->route('digitalreviews.index')->withSuccessMessage('Digital review deleted');
        }

        return view('digitalreviews.index', compact('reviews'));
    }
}

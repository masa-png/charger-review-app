<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $review = Review::find($request->review);

        return view('reviews.index', compact('review'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(ReviewRequest $request)
    {
        $review = new Review();

        $product_count = Product::all()->count();

        // ProductControllerのstore()を実行
        ProductController::store($request);

        $review->title = $request->input('title');
        $review->content = $request->input('content');
        $review->score = $request->input('score');
        $review->product_id = $product_count + 1;
        $review->user_id = Auth::id();
        $review->save();

        return to_route('mypage')->with('flash_message', 'レビュー記事を投稿しました。');
    }
}

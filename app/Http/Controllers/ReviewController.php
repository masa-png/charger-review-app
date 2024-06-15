<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Storage;

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
        $product = new Product();

        // s3に保存
        $path = Storage::disk('s3')->putFile('', $request->file('image'));

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->vendor_id = $request->input('vendor_id');
        $product->wattage_id = $request->input('wattage_id');
        $product->type_id = $request->input('type_id');
        $product->image_path = Storage::disk('s3')->url($path);
        $product->save();

        $review = new Review();

        $review->title = $request->input('title');
        $review->content = $request->input('content');
        $review->score = $request->input('score');
        $review->user_id = Auth::id();

        $product->reviews()->save($review);

        return to_route('mypage')->with('flash_message', 'レビュー記事を投稿しました。');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Review $review, ReviewRequest $request)
    {
        $product = Product::find($review->product_id);

        if ($request->file('image') !== null) {
            // s3に保存
            $path = Storage::disk('s3')->putFile('', $request->file('image'));
            $product->image_path = Storage::disk('s3')->url($path);
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->vendor_id = $request->input('vendor_id');
        $product->wattage_id = $request->input('wattage_id');
        $product->type_id = $request->input('type_id');
        $product->update();

        $review->title = $request->input('title');
        $review->content = $request->input('content');
        $review->score = $request->input('score');
        $review->product_id = $request->input('product_id');
        $review->user_id = $request->input('user_id');
        $review->update();

        return to_route('mypage')->with('flash_message', 'レビュー記事を編集しました。');
    }
}

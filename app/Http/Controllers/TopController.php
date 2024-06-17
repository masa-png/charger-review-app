<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        $recently_reviews = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('top.index', compact('recently_reviews'));
    }
}

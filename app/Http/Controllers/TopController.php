<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        $recently_reviews = Product::orderBy('created_at', 'desc')->take(3)->get();
        $types = Type::all();

        return view('top.index', compact('recently_reviews', 'types'));
    }
}

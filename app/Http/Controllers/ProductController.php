<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Vendor;
use App\Models\Wattage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        if ($request->vendor !== null) {
            $products = Product::where('vendor_id', $request->vendor)->paginate(6);
            $vendor = Vendor::find($request->vendor);
            $wattage = null;
        } elseif ($request->wattage !== null) {
            $products = Product::where('wattage_id', $request->wattage)->paginate(6);
            $wattage = Wattage::find($request->wattage);
            $vendor = null;
        } elseif ($keyword !== null) {
            $products = Product::where('name', 'like', "%{$keyword}%")->paginate(6);
            $vendor = null;
            $wattage = null;
        } else {
            $products = Product::paginate(6);
            $vendor = null;
            $wattage = null;
        }

        $vendors = Vendor::all();
        $wattages = Wattage::all();

        return view('products.index', compact('products', 'vendor', 'vendors', 'wattage', 'wattages', 'keyword'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public static function store(Request $request)
    {
        $product = new Product();

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->vendor_id = $request->input('vendor_id');
        $product->wattage_id = $request->input('wattage_id');
        $product->type_id = $request->input('type_id');
        $product->save();
    }

    /**
     * Update the specified resource in storage.
     */
    public static function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->vendor_id = $request->input('vendor_id');
        $product->wattage_id = $request->input('wattage_id');
        $product->type_id = $request->input('type_id');
        $product->update();
    }
}

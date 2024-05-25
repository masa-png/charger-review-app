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
        if ($request->vendor !== null) {
            $products = Product::where('vendor_id', $request->vendor)->paginate(6);
            $total_count = Product::where('vendor_id', $request->vendor)->count();
            $vendor = Vendor::find($request->vendor);
            $wattage = null;
        } elseif ($request->wattage !== null) {
            $products = Product::where('wattage_id', $request->wattage)->paginate(6);
            $total_count = Product::where('wattage_id', $request->wattage)->count();
            $wattage = Wattage::find($request->wattage);
            $vendor = null;
        } else {
            $products = Product::paginate(6);
            $total_count = "";
            $vendor = null;
            $wattage = null;
        }

        $vendors = Vendor::all();
        $wattages = Wattage::all();

        $user = Auth::user();
        return view('products.index', compact('products', 'vendor', 'vendors', 'wattage', 'wattages', 'total_count', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

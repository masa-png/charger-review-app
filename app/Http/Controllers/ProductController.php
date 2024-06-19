<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use App\Models\Vendor;
use App\Models\Wattage;
use Illuminate\Http\Request;

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
            $type = null;
        } elseif ($request->wattage !== null) {
            $products = Product::where('wattage_id', $request->wattage)->paginate(6);
            $wattage = Wattage::find($request->wattage);
            $vendor = null;
            $type = null;
        } elseif ($request->type !== null) {
            $products = Product::where('type_id', $request->type)->paginate(6);
            $type = Type::find($request->type);
            $vendor = null;
            $wattage = null;
        } elseif ($keyword !== null) {
            $products = Product::where('name', 'like', "%{$keyword}%")->paginate(6);
            $vendor = null;
            $wattage = null;
            $type = null;
        } else {
            $products = Product::paginate(6);
            $vendor = null;
            $wattage = null;
            $type = null;
        }

        $vendors = Vendor::all();
        $wattages = Wattage::all();

        return view('products.index', compact('products', 'vendor', 'vendors', 'wattage', 'wattages', 'type', 'keyword'));
    }
}

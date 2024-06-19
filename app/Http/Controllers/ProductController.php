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

        $vendor_id = $request->vendor;
        $wattage_id = $request->wattage;
        $type_id = $request->type;

        if ($vendor_id !== null) {
            $products = Product::where('vendor_id', $vendor_id)->paginate(6);
        } elseif ($wattage_id !== null) {
            $products = Product::where('wattage_id', $wattage_id)->paginate(6);
        } elseif ($type_id !== null) {
            $products = Product::where('type_id', $type_id)->paginate(6);
        } elseif ($keyword !== null) {
            $products = Product::where('name', 'like', "%{$keyword}%")->paginate(6);
        } else {
            $products = Product::paginate(6);
        }

        $vendors = Vendor::all();
        $wattages = Wattage::all();
        $types = Type::all();

        return view('products.index', compact('products', 'vendor_id', 'vendors', 'wattage_id', 'wattages', 'type_id', 'types', 'keyword'));
    }
}

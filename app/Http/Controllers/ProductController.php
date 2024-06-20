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

        $vendor_id = $request->vendor_id;
        $wattage_id = $request->wattage_id;
        $type_id = $request->type_id;
        $price = $request->price;

        $sorts = [
            '投稿日が新しい順' => 'created_at desc',
            '価格が安い順' => 'price asc',
        ];

        $sort_query = [];
        $sorted = 'created_at desc';

        if ($request->has('select_sort')) {
            $slices = explode(' ', $request->input('select_sort'));
            $sort_query[$slices[0]] = $slices[1];
            $sorted = $request->input('select_sort');
        }

        if ($keyword !== null) {
            $products = Product::whereHas('vendor', function ($query) use ($keyword) {
                $query->where('vendors.name', 'like', "%{$keyword}%");
            })
                ->orWhereHas('wattage', function ($query) use ($keyword) {
                    $query->where('wattages.watt', 'like', "%{$keyword}%");
                })
                ->orWhereHas('type', function ($query) use ($keyword) {
                    $query->where('types.name', 'like', "%{$keyword}%");
                })
                ->orWhere('name', 'like', "%{$keyword}%")
                ->sortable($sort_query)->orderBy('created_at', 'desc')->paginate(6);
        } elseif ($vendor_id !== null) {
            $products = Product::where('vendor_id', $vendor_id)->sortable($sort_query)->orderBy('created_at', 'desc')->paginate(6);
        } elseif ($wattage_id !== null) {
            $products = Product::where('wattage_id', $wattage_id)->sortable($sort_query)->orderBy('created_at', 'desc')->paginate(6);
        } elseif ($type_id !== null) {
            $products = Product::where('type_id', $type_id)->sortable($sort_query)->orderBy('created_at', 'desc')->paginate(6);
        } elseif ($price !== null) {
            $products = Product::where('price', '<=', $price)->sortable($sort_query)->orderBy('created_at', 'desc')->paginate(6);
        } else {
            $products = Product::sortable($sort_query)->orderBy('created_at', 'desc')->paginate(6);
        }

        $vendors = Vendor::all();
        $wattages = Wattage::all();
        $types = Type::all();

        return view('products.index', compact('products', 'vendor_id', 'vendors', 'wattage_id', 'wattages', 'type_id', 'types', 'price', 'keyword', 'sorts', 'sorted'));
    }
}

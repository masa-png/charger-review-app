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
        $pricelist = [
            '2000円未満' => '0,2000',
            '2000円〜5000円' => '2000,5000',
            '5000円〜10000円' => '5000,10000',
            '10000円以上' => '10000,200000'
        ];

        $keyword = $request->keyword;

        $vendor_id = $request->vendor_id;
        $wattage_id = $request->wattage_id;
        $type_id = $request->type_id;
        $price_selection = $request->price;

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
        } else {
            $query = Product::query();

            if ($vendor_id !== null) {
                $query->where('vendor_id', $vendor_id);
            }
            if ($wattage_id !== null) {
                $query->where('wattage_id', $wattage_id);
            }
            if ($type_id !== null) {
                $query->where('type_id', $type_id);
            }
            if ($price_selection !== null) {
                $priceArray = explode(',', $price_selection);
                $query->whereBetween('price', $priceArray);
            }
            $query->sortable($sort_query)->orderBy('created_at', 'desc');
            $products = $query->paginate(6);
        }

        $vendors = Vendor::all();
        $wattages = Wattage::all();
        $types = Type::all();

        return view('products.index', compact('products', 'pricelist', 'vendor_id', 'vendors', 'wattage_id', 'wattages', 'type_id', 'types', 'price_selection', 'keyword', 'sorts', 'sorted'));
    }
}

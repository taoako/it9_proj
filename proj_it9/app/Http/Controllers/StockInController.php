<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Product;

class StockInController extends Controller
{

    public function index()
    {
        return view('stockin.index');
    }
    public function create()
    {
        return view('stock-in.create', [
            'suppliers' => Supplier::all(),
            'categories' => Category::all(),
            'products' => [], // Optional preload if you want
        ]);
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name', 'like', "%$query%")->get(['id', 'name', 'cost']);
        return response()->json($products);
    }
}

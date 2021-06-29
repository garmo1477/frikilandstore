<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MerchanController extends Controller
{
    public function index()
    {
        $products = Product::where('category', '=', 'Merchan')->paginate(4);
        return view('partials.products.merchan', compact('products'));
    }
}

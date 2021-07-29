<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $products = Product::where('category', '=', 'Peliculas')->latest()->paginate(4);
        return view('partials.products.movies', compact('products'));
    }
}

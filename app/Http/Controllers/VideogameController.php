<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    public function index()
    {
        $products = Product::where('category', '=', 'Videojuegos')->latest()->paginate(4);
        return view('partials.products.videogames', compact('products'));
    }
}

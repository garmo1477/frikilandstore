<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class WelcomeController extends Controller
{
    public function index()
    {       
        $products = Product::latest('created_at')->paginate(8);     
        $inoffer = Product::where('in_offer', '=', 1)->latest()->get();
        return view('welcome', compact('products', 'inoffer'));          
    }
}

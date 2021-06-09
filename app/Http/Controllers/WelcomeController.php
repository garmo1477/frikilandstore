<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class WelcomeController extends Controller
{
    public function index()
    {       
        $products = Product::latest('created_at')->get();     
        $inoffer = Product::where('in_offer', '=', 1)->get();
        return view('welcome', compact('products', 'inoffer'));          
    }
}

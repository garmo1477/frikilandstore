<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $products = Product::all()
            ->where('user_id', auth()->id());     
        return view('seller.index', compact('products'));
    }
}

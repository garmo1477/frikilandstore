<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;

class SellerController extends Controller
{
    public function index()
    {
        $products = Product::all()
            ->where('user_id', auth()->id());
        $user = auth()->id();
        //dd($user);
        return view('seller.index', compact('products', 'user'));
    }

    public function show(User $user)
    {
        $user_data = User::find($user);        
        return view('partials.seller.datos.show', compact('user_data'));
    }
}

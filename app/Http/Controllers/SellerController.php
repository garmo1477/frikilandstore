<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        $products = Product::all()
            ->where('user_id', auth()->id());     
        return view('seller.index', compact('products'));
    }

    public function show(User $user)
    {        
        $user = User::where('id', '=', $user->id)->get();
        return view ('partials.seller.datos.show', compact('user'));
    }
}

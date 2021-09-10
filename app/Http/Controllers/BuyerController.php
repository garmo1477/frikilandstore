<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('buyer.index', compact('user'));
    }

   
}

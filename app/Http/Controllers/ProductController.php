<?php

namespace App\Http\Controllers;

use App\Helpers\UploadImage;
use App\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create()
    {
        $product = new Product();
        $textButton = 'Crear producto';
        $title = 'Crear nuevo producto';
        $options = ['route' => ['seller.store'], 'files' => true];
        return view('partials.seller.products.create', compact('product', 'textButton', 'options', 'title'));
    }

    public function store(Request $request)
    {
        $product = $request->all();

        $product['user_id'] = auth()->user()->id;

        if ($file = $request->file('image')) {
            //guardamos el nombre de la imagen en una variable
            $name_file = $file->getClientOriginalName();
            // nueve la imagen a la carpeta images, si no existe tal carpeta, la crea
            $file->move('images', $name_file);
            $product['image'] = $name_file;
        }
        Product::create($product);
        return redirect()->route('seller.create')->with('status', 'Producto creado con éxito');
    }

    public function edit(Product $product)
    {
        $textButton = 'Editar producto';
        $options = ['route' => ['seller.edit', ['product' => $product]], 'files' => true];
        $title = 'Editar un producto';
        $update = true;        

        return view('partials.seller.products.edit', compact('product', 'textButton', 'options', 'title', 'update', 'met'));
    }

    public function update(Product $product, Request $request)
    {
    
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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

        if (isset($request['in_offer'] ))
        {
            $request['in_offer'] = 1;
        }

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

        return view('partials.seller.products.edit', compact('product', 'textButton', 'options', 'title', 'update'));
    }

    public function update(Product $product, Request $request)
    {
       
        $request->validate([
            'name_product' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);       
        if (!isset($request['in_offer'] ))
        {
            $request['in_offer'] = 0;
        }

        $data = $request->all();
        if ($request->hasFile('image')){
            $photo = $request->file('image');
            $name_image = time().$photo->getClientOriginalName(); 
            $photo->move(public_path().'/images/', $name_image);          
            $data['image'] = $name_image; 

          }
        $product->update($data);

        return redirect(route('seller.index'))->with('status', 'Producto actualizado correctamente');

    }

    public function destroy(Product $product)
    {
        $data = Product::find($product)->first;
        $data->delete();
        return back()->with('status', 'Producto eliminado correctamente');
    }

}

<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index',compact('products')); //listado de producto
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metodo = 'crear';
        return view('admin.products.product',compact('metodo')); //formulario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener al menos 3 carácteres.',
            'description.required' => 'La descripción es obligatorio.',
            'description.max' => 'La descripción no puede exceder los 50 carácteres.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio tiene que ser númerico.',
            'price.min' => 'El precio no puede ser menor a cero.',
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:100',
            'price' => 'required|numeric|min:0'
        ];

        $this->validate($request,$rules,$messages);
        //registrar nuevos productos
        $product = new Product();

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->price = $request->input('price');

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $metodo = 'editar';
        return view('admin.products.product',compact('metodo','product')); //formulario
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener al menos 3 carácteres.',
            'description.required' => 'La descripción es obligatorio.',
            'description.max' => 'La descripción no puede exceder los 50 carácteres.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio tiene que ser númerico.',
            'price.min' => 'El precio no puede ser menor a cero.',
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:100',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request,$rules,$messages);
        //
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->price = $request->input('price');

        $product->save();

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //r
        $product->delete();
        return redirect()->back();
    }
}

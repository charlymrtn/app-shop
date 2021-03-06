<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
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
        $products = Product::orderBy('name')->paginate(10);
        $metodo = 'products';
        return view('admin.products.index',compact('products','metodo')); //listado de producto
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metodo = 'crear';
        $categories = Category::orderBy('name')->get();
        return view('admin.products.product',compact('metodo','categories')); //formulario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Product::$rules,Product::$messages);
        //registrar nuevos productos
        $product =Product::create($request->all());

        $notificacion = 'El producto fue creado correctamente.';
        $status = 'success';

        return redirect()->route('products.index')->with(compact('notificacion','status'));
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
        $metodo = 'profile';

        $images = $product->images;
        $imgL = collect();
        $imgR = collect();
        foreach ($images as $key => $image) {
            # code...
            $key%2==0 ? $imgL->push($image) : $imgR->push($image);
        }

        return view('admin.products.product',compact('metodo','product','imgL','imgR')); //formulario
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
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.products.product',compact('metodo','product','categories')); //formulario
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

        $this->validate($request,Product::$rules,Product::$messages);
        //
        if($request->has('stock')){
            $stock = $request->stock;
            if($stock < $product->stock){
                $notificacion = 'El número de piezas no puede ser menor al actual, las piezas solo salen en ventas.';
                $status = 'error';

                return redirect()->route('products.edit',$product->id)->with(compact('notificacion','status'));
            }
        }
        $product->update($request->all());

        $notificacion = 'El producto fue editado correctamente.';
        $status = 'success';

        return redirect()->route('products.index')->with(compact('notificacion','status'));

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
        $notificacion = 'El producto fue eliminado correctamente.';
        $status = 'success';
        return redirect()->back()->with(compact('notificacion','status'));
    }

    public function query(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name','like',"%$query%")->paginate(9);

        if($products->count() == 1){
            $id = $products->first()->id;
            return redirect()->route('products.show',$id);
        }

        $metodo = 'results';
        return view('admin.products.index',compact('products','metodo','query'));
    }

    public function json()
    {
        $products = Product::pluck('name');

        return $products;
    }
}

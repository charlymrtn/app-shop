<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index',compact('categories')); //listado de producto
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $metodo = 'crear';
        return view('admin.categories.category',compact('metodo')); //formulario
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,Category::$rules,Category::$messages);

        //registrar nueva categoria
        $category = Category::create($request->all());

        $notificacion = 'La categoría fue creada correctamente.';
        $status = 'success';

        return redirect()->route('categories.index')->with(compact('notificacion','status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $metodo = 'profile';

        $products = $category->products()->paginate(9);

        return view('admin.categories.category',compact('metodo','products','category')); //formulario
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $metodo = 'editar';
        return view('admin.categories.category',compact('metodo','category')); //formulario
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,Category::$rules,Category::$messages);

        //registrar nueva categoria
        $category->update($request->all());

        $notificacion = 'La categoría fue editada correctamente.';
        $status = 'success';

        return redirect()->route('categories.index')->with(compact('notificacion','status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $notificacion = 'La categoría fue eliminada correctamente.';
        $status = 'success';
        return redirect()->back()->with(compact('notificacion','status'));
    }
}

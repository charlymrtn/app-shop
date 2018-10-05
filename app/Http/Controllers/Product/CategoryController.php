<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Image as Img;
use File;

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

        $category = Category::create($request->only('name','description'));

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = uniqid() . $image->getClientOriginalName();
            $path = public_path("images\categories\\" . $filename);

            $moved = Img::make($image)
                ->resize(250,250)
                ->save($path);

            if($moved){
                $category->image = 'images/categories/' . $filename;

                $category->save();

                $notificacion = 'La categoría fue creada correctamente.';
                $status = 'success';
            }else{
                $notificacion = 'Hubo un problema al guardar la imágen';
                $status = 'error';
                return redirect()->route('categories.index')->with(compact('notificacion','status'));
            }

        }else{

            $notificacion = 'La categoría fue creada correctamente.';
            $status = 'success';
        }


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

        //editar categoria
        $category->update($request->only('name','description'));

        if($request->hasFile('image')){
            if($category->image){
                $deleted = true;
                $fullPath = public_path().'\\'.$category->image;
                $deleted = File::delete($fullPath);

                if(!$deleted){
                    $notificacion = 'Hubo un problema al eliminar la imagen anterior';
                    $status = 'error';
                    return redirect()->route('categories.show',$category->id)->with(compact('notificacion','status'));
                }
            }

            $image = $request->file('image');
            $filename = uniqid() . $image->getClientOriginalName();
            $path = public_path("images\categories\\" . $filename);

            $moved = Img::make($image)
                ->resize(250,250)
                ->save($path);

            if($moved){
                $category->image = 'images/categories/' . $filename;
                $category->save();

                $notificacion = 'La categoría fue editada correctamente.';
                $status = 'success';
            }else{
                $notificacion = 'Hubo un problema al guardar la imágen';
                $status = 'error';
                return redirect()->route('categories.index')->with(compact('notificacion','status'));
            }

        }else{

            $notificacion = 'La categoría fue editada correctamente.';
            $status = 'success';
        }

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

        if($category->image){
            $deleted = true;
            $fullPath = public_path().'/'.$category->image;
            $deleted = File::delete($fullPath);

            if(!$deleted){
                $notificacion = 'La categoría no pudo ser eliminada.';
                $status = 'error';
                return redirect()->back()->with(compact('notificacion','status'));
            }
        }

        $category->delete();

        $notificacion = 'La categoría fue eliminada correctamente.';
        $status = 'success';
        return redirect()->back()->with(compact('notificacion','status'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage as Image;
use File;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function index($id)
    {
        $product = Product::find($id);
        $images = $product->images;
        return view('admin.images.index',compact('product','images'));
    }

    public function store(Request $request, $id)
    {
        $messages = [
            'photo.required' => 'La imágen es requerida.'
        ];

        $rules = [
            'photo' => 'required'
        ];

        $this->validate($request,$rules,$messages);

        $file = $request->file('photo');
        $path = public_path() . '/images/products'; //Ruta donde se guardará la imágen (ruta absoluta public_path)
        $fileName = uniqid() . $file->getClientOriginalName(); //Definir nombre para el archivo ID único + nombre original
        $moved = $file->move($path, $fileName);

        if($moved){
            $image = new Image();
            $image->image = $fileName;
            $image->product_id = $id;

            $image->save();
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $image = Image::find($id);
        $deleted = true;
        if(substr($image->image,0,4) !== 'http'){
            $fullPath = public_path().'/images/products/'.$image->image;
            $deleted = File::delete($fullPath);
        }
        if($deleted) $image->delete();

        return back();
    }
}

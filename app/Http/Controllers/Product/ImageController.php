<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage as Image;
use File;
use Image as Img;
use Session;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function index($id)
    {
        $product = Product::find($id);
        $images = $product->images()->orderBy('featured','desc')->get();
        Session::put('product_id',$product->id);
        return view('admin.images.index',compact('product','images'));
    }

    public function store(Request $request, $id)
    {
        $messages = [
            'photo.required' => 'La imágen es requerida.'
        ];

        $rules = [
            'photo' => 'required|image'
        ];

        $this->validate($request,$rules,$messages);

        $file = $request->file('photo');
        $path = public_path() . '/images/products/'; //Ruta donde se guardará la imágen (ruta absoluta public_path)
        $fileName = uniqid() . $file->getClientOriginalName(); //Definir nombre para el archivo ID único + nombre original
        //$moved = $file->move($path, $fileName);

        $moved = Img::make($file)
                ->resize(250,250)
                ->save($path . $fileName);

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
        $product_id = Session::get('product_id');
        $image = Image::find($id)->where('product_id',$product_id)->first();
        $deleted = true;
        if(substr($image->image,0,4) !== 'http'){
            $fullPath = public_path().'/images/products/'.$image->image;
            $deleted = File::delete($fullPath);
        }
        if($deleted) $image->delete();

        $notificacion = 'imagen eliminada correctamente';
        $status = 'success';
        return back()->with(compact('notificacion','status'));
    }

    public function featured($product,$image)
    {

        $image = Image::find($image);
        if(!$image->featured){
            $image->featured = true;
            $images = Image::where('product_id',$product)->update([
                'featured' => false
            ]);
        }

        $image->save();

        return back();
    }
}

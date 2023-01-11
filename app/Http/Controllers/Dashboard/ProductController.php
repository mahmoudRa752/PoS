<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::when($request->search , function($query) use($request){

            return $query->where('name','like','%'.$request->search.'%');
        })->when($request->category_id,function($q) use($request){

            return $q->where('category_id',$request->category_id);
        })->paginate(5);
        return view('dashboard.products.index',compact('categories' , 'products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'description'=>'required',
            'purchase_price'=>'required',
            'sale_price'=>'required',
            'stock'=>'required',
        ]);
        $request_data=$request->all();
        if($request->image){
            Image::make($request->image)
                ->resize(300,null,function($constraint){
                    $constraint->aspectRatio();
                })->save(public_path('uploads\products-images\\'.$request->image->hashName()));
                $request_data['image']=$request->image->hashName();
        }


        Product::create($request_data);

        session()->flash('success','Product Created Successfully');
        return redirect(route('dashboard.products.index'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit',compact('categories','product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'description'=>'required',
            'purchase_price'=>'required',
            'sale_price'=>'required',
            'stock'=>'required',
        ]);

        $request_data=$request->all();
        if($request->image){
            if($product->image != 'default.jpg'){
                Storage::disk('public_uploads')->delete('/products_images//'.$product->image);
            }
        }

        if($request->image){
            Image::make($request->image)
                ->resize(300,null,function($constraint){
                    $constraint->aspectRatio();
                })->save(public_path('uploads\products-images\\'.$request->image->hashName()));
                $request_data['image']=$request->image->hashName();
        }

        $product->update($request_data);

        session()->flash('success','Product Updated Successfully');
        return redirect(route('dashboard.products.index'));
    }

    public function destroy(Product $product)
    {
        Product::delete($product);

        session()->flash('success','Product Deleted Successfully');
        return back();
    }
}

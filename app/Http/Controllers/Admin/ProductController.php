<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use App\Product;
use App\ProductsCategory;
use Illuminate\Http\Request;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Form::class;
        $products = Product::get();
        return view('admin.productslist',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = ProductsCategory::get();
        return view('admin.addproduct',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        if ($request['image']){
            $file = $request['image'];
            $image= time().".".$file->getClientOriginalExtension();
            $path = public_path('/images/products/');
            $file->move($path,$image);
            $product->main_image = $image;
        }
        if ($request->brand){
            $product->brand = $request->brand;
        }
        if ($request->cat){
            $product->cat = implode('%',$request->cat);
        }
        if ($request->discount){
            $product->discount = $request->discount;
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->body = $request->body;
        $product->status = $request->status;
        $product->save();
        return redirect(url('product'));
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name'=>$request->name,
            'price'=>$request->price,
            'body'=>$request->body,
            'status'=>$request->status,
        ];
        if ($request['image']){
            $file = $request['image'];
            $image= time().rand().".".$file->getClientOriginalExtension();
            $path = public_path('/images/products/');
            $file->move($path,$image);
            $data['main_image']=$image;
        }
        if ($request->cat){
            $data['cat'] = implode('%',$request->cat);
        }
        if ($request->brand){
            $data['brand']=$request->brand;
        }
        if ($request->discount){
            echo "<script>alert('".$request->discount."')</script>";
            $data['discount']=$request->discount;
        }
        Product::where('id',$id)->update($data);
        if ($request['images']){
            foreach ($request['images'] as $img){
                $image= time().rand().".".$img->getClientOriginalExtension();
                $path = public_path('/images/products/');
                $img->move($path,$image);
                $newimg = new Image();
                $newimg->products_id = $id;
                $newimg->path = $image;
                $newimg->save();
            }
        }
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::where('id',$id)->first();
        $images = Image::where('products_id',$id)->get();
        return view('admin.productshow',compact('product'))->with('images',$images);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $images = Image::where('products_id',$id)->get();
        $cats = ProductsCategory::get();
        return view('admin.editproduct')->with('product',$product)->with('images',$images)->with('cats',$cats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect(route('product.index'));
    }

    public function deletepic($id , $pid)
    {
        $res = Image::where([
            ['id', '=', $id],
            ['products_id', '=', $pid],
        ])->get()->toArray();
        //var_dump($res);
        if (!empty($res)){
            Image::where('id',$id)->delete();
            return redirect(route('product.edit',$pid));
        }else{
            echo '
            <script>alert("خطا")</script>';
            return redirect(route('product.edit',$pid));
        }
        /*Image::where('id',$id)->delete();
        $product = Image::where('id',$id)->pluck('products_id')->first();
        var_dump($product);*/
        //return redirect()
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentCategories = PostCategory::where('parent',0)->get();
        $cats=PostCategory::get();
        return view('admin.postcategory',compact('cats','parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new PostCategory();
        $cat->title=$request->title;
        $cat->desc=$request->desc;
        if ($request->parent == ''){
            $cat->parent = '0';
        }else{
            $cat->parent=$request->parent;
        }
        $cat->save();
        return redirect(route('postcat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat_id = $_GET['ide'];
        $cat_info = PostCategory::where('id',$cat_id)->first();
        $result = json_encode($cat_info);
        echo $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        PostCategory::where('id',$id)->update([
            'title'=>$request->title,
            'desc'=>$request->desc,
        ]);
        return redirect(route('postcat.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PostCategory::where('id',$id)->delete();
        return redirect(route('postcat.index'));
    }
}

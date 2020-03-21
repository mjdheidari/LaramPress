<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('admin.postslist',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = PostCategory::get();
        return view('admin.addpost',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'excerpt' => 'required',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->excerpt = $request->excerpt;
        $post->author = $request->auth;

        if ($request['image']){
            $file = $request['image'];
            $image_name = time().$request->title.".".$file->getClientOriginalExtension();
            $path = public_path('/images/posts/');
            $file->move($path,$image_name);
            $post->image = $image_name;
        }

        if ($request->cat){
            $post->categories = implode('%',$request->cat);
        }
        if ($request->tag){
            $post->tags = implode('%',$request->tag);
        }

        $post->save();
        return redirect(route('posts.index'));
        //var_dump($request->cat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id',$id)->first();
        return view('admin.postshow',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = PostCategory::get();
        $post = Post::where('id',$id)->first();
        return view('admin.editpost',compact('post','cats'));
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
        $post = Post::find($id);
        if ($request['image']){
            $file = $request['image'];
            $image_name = time().$request->title.".".$file->getClientOriginalExtension();
            $path = public_path('/images/posts/');
            $file->move($path,$image_name);
            $post->image=$image_name;
        }
        if ($request->cat != ""){
            $post->categories=implode('%',$request->cat);
        }
        if ($request->excerpt){
            $post->excerpt=$request->excerpt;
        }
        if ($request->tag){
            $post->tags=implode('%',$request->tag);
        }
        $post->title=$request->title;
        $post->content=$request->content;


        $post->save();
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return redirect(route('posts.index'));
    }
}

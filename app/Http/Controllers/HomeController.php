<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(is_null(Auth::user()->level)){
            return redirect("/");
        }else{
            $user = User::whereNull('level')->get();
            $users = count($user);
            $product = Product::get();
            $products = count($product);
            $post = Post::get();
            $posts = count($post);

            $info = [
                'users'=>$users,
                'posts'=>$posts,
                'products'=>$products,
                'admins'=> count(User::wherenotNull('level')->get())
            ];
            return view('admin.home',compact('info'));
        }

    }


}

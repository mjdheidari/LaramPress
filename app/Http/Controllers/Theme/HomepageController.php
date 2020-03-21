<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

//use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('Theme.HomePage', compact('posts'));
    }

    public function postmin()
    {
        $id = $_GET['ide'];
        $user = Post::where('id', $id)->first();
        $res = json_encode($user);
        echo $res;
    }

    public function post($title)
    {
        $post = Post::where([
            ['title', '=', $title],
        ])->first();
        $author = User::where('id',$post->author)->value('name');
        return view('Theme.PostPage',compact('post','author'));
    }

    public function blog()
    {
        $posts = Post::paginate(10);
        return view('Theme.bloglist' , compact('posts'));
    }

    public function author($author)
    {
        $posts = Post::where('author',$author)->paginate(10);
        return view('Theme.bloglist' , compact('posts'));
    }
    public function category($category)
    {
        $posts = Post::orWhere('categories', 'LIKE', "%{$category}%")->paginate(10);
        return view('Theme.bloglist' , compact('posts'));
    }
    public function tag($tag)
    {
        $posts = Post::orWhere('tags', 'LIKE', "%{$tag}%")->paginate(10);
        return view('Theme.bloglist' , compact('posts'));
    }

    public function likepost($id)
    {
        Post::whereid($id)->Increment('like');
        return Redirect::back();
    }

    public function viewpost($id)
    {
        Post::whereid($id)->Increment('view');
    }
}

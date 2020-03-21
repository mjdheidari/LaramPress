<?php

namespace App\Http\Controllers\Theme;

use App\Comments;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function index(Request $request , $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'comment'=>'required',
        ]);
        $comment = new Comments();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->post_id = $id;
        $comment->comment = $request->comment;
        $comment->save();
        return back()->with('msg','باتشکر، دیدگاه شما پس از بررسی توسط ادمین، در سایت ثبت خواهد شد.');

    }

    public function show($id)
    {
        $comments = Comments::where([
            ['post_id','=',$id],
            ['status','=','1'],
        ])->get();
        echo json_encode($comments);

    }

    public function list()
    {
        $cmnts = Comments::get();
        return view('admin.commentslist',compact('cmnts'));
    }

    public function trashed()
    {
        $cmnts = Comments::where('status' , 2)->get();
        return view('admin.commentstrashed',compact('cmnts'));
    }
    public function published()
    {
        $cmnts = Comments::where('status' , 1)->get();
        return view('admin.commentspublished',compact('cmnts'));
    }

    public function check()
    {
        $cmnts = Comments::where('status' , 0)->get();
        return view('admin.commentscheck',compact('cmnts'));
    }

    public function detail()
    {
        $id=$_GET['ide'];
        $cmntinfo = Comments::where('id',$id)->get()->toArray();
        $post = Post::where('id',$cmntinfo[0]['post_id'])->value('title');
        $cmntinfo[0]['post']=$post;
        //var_dump($cmntinfo[0]);
        echo json_encode($cmntinfo);
        //return view('admin.commentslist',compact('cmnts'));
    }

    public function display($id)
    {
        Comments::where('id',$id)->update(['status'=>1]);
        return redirect()->back()->with('msg','دیدگاه با موفقیت در سایت ثبت شد.');
    }

    public function trash($id)
    {
        Comments::where('id',$id)->update(['status'=>2]);
        return redirect()->back()->with('msg','دیدگاه با موفقیت به زباله دان منتقل شد.');
    }
}

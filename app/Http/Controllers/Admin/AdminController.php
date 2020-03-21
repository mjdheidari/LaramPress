<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.setting');
    }

    public function info(Request $request,$id)
    {
        $current_email = User::where('id',$id)->value("email");
        var_dump($current_email);
        if($request->email == $current_email){
            $data = $request->validate([
                'name' => ['required', 'min:5', 'max:100'],
            ]);
        }else{
            $data = $request->validate([
                'name' => ['required', 'min:5', 'max:100'],
                'email' => ['required','email','min:5','unique:users','max:150'],
            ]);
        }
        //var_dump($data);
        User::where('id',$id)->update($data);
        Session::flash('message', 'مشخصات شما با موفقیت ویرایش شد.');
        return redirect(route('setting.index'));
    }

    public function about(Request $request,$id)
    {
        $data = $request->validate([
            'about' => ['required', 'max:255'],
        ]);

        //var_dump($data);
        User::where('id',$id)->update($data);
        Session::flash('message', ' متن "درباره من" با موفقیت ویرایش شد.');
        return redirect(route('setting.index'));
    }

    public function image($id,$image)
    {
        //var_dump($data);
        User::where('id',$id)->update([
            'image'=>$image,
        ]);
        Session::flash('message', 'آواتار شما با موفقیت ویرایش شد.');
        return redirect(route('setting.index'));
    }

    public function resetpassword(Request $request,$id)
    {
        $pass = $request->validate([
            'newpass'=> ['required_with:confnewpass', 'same:confnewpass', 'max:25','min:8'],
        ]);

        User::where('id',$id)->update(['password' => Hash::make($pass['newpass'])]);
        Session::flash('message', 'رمز عبور با موفقیت ویرایش شد.');

        return redirect(route('setting.index'));
    }
    public function imageUploader($file)
    {
        return $image;
    }
}

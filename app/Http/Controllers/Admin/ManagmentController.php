<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('level','!=','')->get();
        //var_dump($users);
        return view('admin.manage',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereNull('level')->get();
        return view('admin.adminadd' , compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'level' => ['required'],
        ]);
        echo $validatedData['level'];
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->level= $validatedData['level'];
        $user->save();
        //var_dump($validatedData);
        //User::create($validatedData);
        return redirect(route('managment.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uid = $_GET['ide'];
        $user = User::where('id',$uid)->first();
        $res = json_encode($user);
        echo $res;

        /*
         * $name = $_GET['name'];
        $last = $_GET['last'];$cart = User::where('id',$id)->first();
        //return response()->json(array('msg'=> $id), 200);
        return view('admin.userinfo',compact('cart'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        User::where('id',$id)->update([
            'level'=>$request->level,
        ]);
        return redirect(route('managment.index'));
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
        User::where('id',$id)->update(['level'=>$request->level]);
        return redirect(route('managment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect(route('managment.index'));

    }

    public function disable($id)
    {
        User::where('id',$id)->update([
            'level'=>null,
        ]);
        return redirect(route('managment.index'));
    }
}

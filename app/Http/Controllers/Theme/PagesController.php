<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\ThemePages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = ThemePages::get();

        return view('admin.pages',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $info = $request->validate([
            'data'=>'required',
        ]);
        $data = new ThemePages();
        $data->data = $request->data;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ide = $_GET['ide'];

        
        $data = ThemePages::where('id' , $ide)->where('id',$id)->get();
        $data = ThemePages::where([
            ['id','=',$var],
            ['name','=',$var2],
        ])->get();


        echo json_encode($data);
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
        $request->validate([
            'data'=>'required',
        ]);
        ThemePages::where('id',$id)->update(['data'=>$request->data]);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function about()
    {
        $data = ThemePages::where('page','about-us')->value('data');
        return view('Theme.aboutpage',compact('data'));
    }
    public function contact()
    {
        $data = ThemePages::where('page','contact-us')->value('data');
        return view('Theme.contactpage',compact('data'));
    }
}


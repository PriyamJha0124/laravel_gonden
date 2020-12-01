<?php

namespace App\Http\Controllers;

use App\Model\Picture;
use App\Model\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use Response;
use Image;

class PictureController extends Controller
{

    public function checkPermission() {
        if(auth()->user()->hasRole('admin'))
            return true;
        else
            return false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        if(!$this->checkPermission())
            return redirect('home');

        $this->validate($request, [ 
            'file' => 'image|max:2000|mimes:jpeg,png,gif',
        ]);

        $picture = $request->file('file')->store('pictures');
        $picture_name = $request->file('file')->getClientOriginalName();
        

        Picture::create([
            'shop_id' => $request->shop_id,
            'name' => $picture_name,
            'picture' => $picture,
        ]);

        return redirect()->back()->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $picture = Picture::find($id);
        return Response::json($picture);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->checkPermission())
            return redirect('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');
        
        $pic = Picture::find($request->picture_id);
        
        if($pic->picture != null){
            $path = public_path()."/images/".$pic->picture;
            unlink($path);
        }
        $pic->delete();

        return redirect()->back()->with('success', 'Record Deleted Successfully');
    }
}

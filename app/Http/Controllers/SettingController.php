<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Setting;

use Response;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::get();

        return view('admin.setting.setting', compact('setting'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request, [ 
            'app_name' => 'required',
            'about' => 'required',
            'picture' => 'image|max:2000|mimes:jpeg,png,gif',
        ]);

        if($request->picture){

            $setting = Setting::find($id);

            if($setting->picture != null){
                $path = public_path()."/images/".$setting->picture;
                unlink($path);
            }

            $picture = $request->file('picture')->store('pictures');

            Setting::find($id)->update([
                'app_name' => $request->app_name,
                'about' => $request->about,
                'picture' => $picture,
            ]);
        }
        else{
            Setting::find($id)->update([
                'app_name' => $request->app_name,
                'about' => $request->about,
            ]);
        }

        return redirect()->back()->with('success', 'Record Updated Successfully');
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
}

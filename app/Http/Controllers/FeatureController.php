<?php

namespace App\Http\Controllers;

use App\Model\Feature;
use App\Model\Shop;
use Illuminate\Http\Request;

use Response;
use Image;

class FeatureController extends Controller
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
            'name' => 'required',
            'logo' => 'image|max:2000|mimes:jpeg,png,gif',            
        ]);

        if($request->hasFile('logo')){
            $logo = $request->file('logo')->store('pictures');
        }
        else{
            $logo = null;
        }

        Feature::create([
            'shop_id' => $request->shop_id,
            'name' => $request->name,
            'logo' => $logo,
        ]);

        return redirect()->back()->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $feature = Feature::find($id);
        return Response::json($feature);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $feature = Feature::find($id);
        return Response::json($feature);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $this->validate($request, [ 
            'name' => 'required',
            'logo' => 'image|max:2000|mimes:jpeg,png,gif',
        ]);

        if($request->logo){

            $logo = $request->file('logo')->store('pictures');


            Feature::find($request->feature_id)->update([
                'name' => $request->name,
                'logo' => $logo,
            ]);
        }
        else{
            Feature::find($request->feature_id)->update([
                'name' => $request->name,
            ]);
        }

        return redirect()->back()->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');
        
        $feature = Feature::find($request->feature_id);
        
        if($feature->logo != null){
            $path = public_path()."/images/".$feature->logo;
            unlink($path);
        }
        $feature->delete();

        return redirect()->back()->with('success', 'Record Deleted Successfully');
    }
}

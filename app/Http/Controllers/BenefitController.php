<?php

namespace App\Http\Controllers;

use App\Model\Benefit;
use App\Model\Shop;
use Illuminate\Http\Request;

use Response;
use Image;

class BenefitController extends Controller
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

        Benefit::create([
            'shop_id' => $request->shop_id,
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logo,
        ]);

        return redirect()->back()->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $benefit = Benefit::find($id);
        return Response::json($benefit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $benefit = Benefit::find($id);
        return Response::json($benefit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $this->validate($request, [ 
            'name' => 'required',
            'description' => 'required',
            'logo' => 'image|max:2000|mimes:jpeg,png,gif',
        ]);

        if($request->logo){

            $logo = $request->file('logo')->store('pictures');

            Benefit::find($request->benefit_id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'logo' => $logo,
            ]);
        }
        else{
            Benefit::find($request->benefit_id)->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        return redirect()->back()->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Benefit  $benefit
     * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');
        
        $benefit = Benefit::find($request->benefit_id);

        if($benefit->logo != null){
            $path = public_path()."/images/".$benefit->logo;
            unlink($path);
        }
        $benefit->delete();

        return redirect()->back()->with('success', 'Record Deleted Successfully');
    }
}

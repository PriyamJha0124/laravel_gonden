<?php

namespace App\Http\Controllers;

use App\Model\Offer;
use App\Model\Shop;
use Illuminate\Http\Request;

use Response;
use Image;

class OfferController extends Controller
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
            'description' => 'required',
        ]);

        Offer::create([
            'shop_id' => $request->shop_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $offer = Offer::find($id);
        return Response::json($offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $offer = Offer::find($id);
        return Response::json($offer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $this->validate($request, [ 
            'name' => 'required',
            'description' => 'required',
        ]);

        Offer::find($request->offer_id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');
        
        Offer::find($request->offer_id)->delete();

        return redirect()->back()->with('success', 'Record Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\Promo;
use App\Model\Shop;
use Illuminate\Http\Request;

use Response;
use QrCode;
use Storage;

class PromoController extends Controller
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
            'code' => 'required',
        ]);

        $qrcode = QrCode::format('png')->size('400')->generate($request->code);

        $file = 'qrcode/' . $request->name . '.png';
        Storage::disk('public')->put($file, $qrcode);

        Promo::create([
            'shop_id' => $request->shop_id,
            'name' => $request->name,
            'code' => $request->code,
            'qrcode' => $file,
        ]);

        return redirect()->back()->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $promo = Promo::find($id);
        return Response::json($promo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $promo = Promo::find($id);        
        return Response::json($promo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $this->validate($request, [ 
            'name' => 'required',
            'code' => 'required',        
        ]);

        $qrcode = QrCode::format('png')->size('400')->generate($request->code);

        $file = 'qrcode/' . $request->name . '.png';
        Storage::disk('public')->put($file, $qrcode);

        Promo::find($request->promo_id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'qrcode' => $file,
        ]);
        
        return redirect()->back()->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');
        
        $promo = Promo::find($request->promo_id);
        
        if($promo->qrcode != null){
            $path = public_path()."/images/".$promo->qrcode;
            unlink($path);
        }
        $promo->delete();

        return redirect()->back()->with('success', 'Record Deleted Successfully');
    }
}

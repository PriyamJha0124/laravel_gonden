<?php

namespace App\Http\Controllers;

use App\Model\Shop;
use App\Model\Category;
use App\Model\Feature;
use App\Model\Benefit;
use App\Model\City;
use App\Model\Offer;
use App\Model\Promo;
use App\Model\Picture;

use Illuminate\Http\Request;

use Response;
use Image;

class ShopController extends Controller
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
        if(!$this->checkPermission())
            return redirect('home');

        $city = City::all();

        $city_name = [];
        $city_name[0] = null;
        
        foreach($city as $cities){
            $city_name[$cities->id] = $cities->name;
        }

        $category = Category::where('status', 1)->where('id', '!=', 0)->get();

        $category_name = [];
        $category_name[0] = null;
        
        foreach($category as $categories){
            $category_name[$categories->id] = $categories->name;
        }

        $shop = Shop::with(['city','category'])->get();

        return view('admin.shop.shop_list', compact('shop', 'category_name', 'city_name'));
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
            'category_id' => 'required',
            'name' => 'required',
            'rating' => 'required',
            'city_id' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'contact' => 'required|numeric',
            'price' => 'required',
            'picture' => 'image|max:2000|mimes:jpeg,png,gif',
        ]);

        if($request->hasFile('picture')){
            $picture = $request->file('picture')->store('pictures');
        }
        else{
            $picture = null;
        }

        $shop = Shop::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'rating' => $request->rating,
            'price' => $request->price,
            'discount' => $request->discount,
            'location' => $request->location,
            'city_id' => $request->city_id,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'contact' => $request->contact,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'picture' => $picture,
        ]);

        return redirect()->route('shop.index')->with('success','Record Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $shop = Shop::where('id', $id)->with(['category', 'city'])->get();
        return Response::json($shop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->checkPermission())
            return redirect('home');
            
        $shop = Shop::find($id);
        return Response::json($shop);
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
        if(!$this->checkPermission())
            return redirect('home');
        
        $this->validate($request, [ 
            'category_id' => 'required',
            'name' => 'required',
            'rating' => 'required',
            'city_id' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'contact' => 'required|numeric',
            'price' => 'required',
            'picture' => 'image|max:2000|mimes:jpeg,png,gif',
        ]);

        if($request->picture){

            $picture = $request->file('picture')->store('pictures');

            Shop::find($request->shop_id)->update([
                'category_id' => $request->category_id,
                'description' => $request->description,
                'name' => $request->name,
                'rating' => $request->rating,
                'price' => $request->price,
                'discount' => $request->discount,
                'location' => $request->location,
                'city_id' => $request->city_id,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
                'contact' => $request->contact,
                'time_from' => $request->time_from,
                'time_to' => $request->time_to,
                'picture' => $picture,
            ]);
        }
        else{
            Shop::find($request->shop_id)->update([
                'category_id' => $request->category_id,
                'description' => $request->description,
                'name' => $request->name,
                'rating' => $request->rating,
                'price' => $request->price,
                'discount' => $request->discount,
                'contact' => $request->contact,
                'time_from' => $request->time_form,
                'time_to' => $request->time_to,
                'locaiton' => $request->location,
                'city_id' => $request->city_id,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,
            ]);
        }

        return redirect()->route('shop.index')->with('success','Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $shop = Shop::find($request->shop_id);
        if($shop->picture != null){
            $path = public_path()."/images/".$shop->picture;
            unlink($path);
        }

        Feature::where('shop_id', $request->shop_id)->delete();

        Benefit::where('shop_id', $request->shop_id)->delete();

        Promo::where('shop_id', $request->shop_id)->delete();

        Offer::where('shop_id', $request->shop_id)->delete();

        Picture::where('shop_id', $request->shop_id)->delete();

        $shop->delete();

        return redirect()->route('shop.index')->with('success','Record Deleted Successfully');
    }

    public function details(Request $request)
    {
        $shop = Shop::with(['category', 'city'])->where('id', $request->shop_id)->get();

        $feature = Feature::where('shop_id', $request->shop_id)->get();

        $benefit = Benefit::where('shop_id', $request->shop_id)->get();

        $promo = Promo::where('shop_id', $request->shop_id)->get();

        $offer = Offer::where('shop_id', $request->shop_id)->get();

        $picture = Picture::where('shop_id', $request->shop_id)->get();

        return view('admin.detail.detail_list', compact('shop', 'feature', 'benefit', 'offer', 'picture', 'promo'));

    }
}

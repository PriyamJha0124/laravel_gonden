<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

use Response;

class CategoryController extends Controller
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

        $category = Category::where('id', '!=', 0)->get();

        // $category = Category::all();

        return view('admin.category.category_list', compact('category'));
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

        Category::create([
            'name' => $request->name,
            'logo' => $logo,
        ]);

        return redirect()->route('category.index')->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $category = Category::find($id);
        return Response::json($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $category = Category::find($id);
        return Response::json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
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

            Category::find($request->category_id)->update([
                'name' => $request->name,
                'logo' => $logo,
            ]);
        }
        else{
            Category::find($request->category_id)->update([
                'name' => $request->name,
            ]);
        }

        return redirect()->route('category.index')->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');
        
        Category::find($request->category_id)->delete();

        return redirect()->route('category.index')->with('success', 'Record Deleted Successfully');
    }

    public function status(Request $request)
    {
        if(!$this->checkPermission())
            return redirect('home');

        Category::find($request->category_id)->update([
            'status' => $request->status,
        ]);

        return redirect()->route('category.index')->with('success', 'Record Updated Successfully');
    }
}

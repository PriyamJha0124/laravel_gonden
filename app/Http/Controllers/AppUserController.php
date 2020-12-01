<?php

namespace App\Http\Controllers;

use App\Model\AppUser;
use Illuminate\Http\Request;

use Response;
use Image;

class AppUserController extends Controller
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

        $user = AppUser::all();

        return view('admin.user.app_user_list', compact('user'));
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
            'email' => 'required',
            'contact' => 'required',
        ]);

        AppUser::create($request->all());

        return redirect()->route('user.index')->with('success', 'Record Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppUser  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $user = AppUser::find($id);
        return Response::json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppUser  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $user = AppUser::find($id);
        return Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppUser  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $this->validate($request, [ 
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
        ]);
    
        AppUser::find($request->user_id)->update($request->all());

        return redirect()->route('user.index')->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppUser  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');
        
        AppUser::find($request->user_id)->delete();

        return redirect()->route('user.index')->with('success', 'Record Deleted Successfully');
    }
}

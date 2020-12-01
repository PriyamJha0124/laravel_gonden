<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Auth;
use Response;
use DB;

class UserController extends Controller
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

        $user = DB::table('users')
            ->join('roles', 'users.role_id','=', 'roles.id')
            ->select('users.id','users.name','users.email','users.role_id','roles.name AS role_name')
            ->get();

        $role = Role::all();
        
        $role_name = [];
        foreach($role as $roles){
            $role_name[$roles->id] = $roles->name;
        }
        return view('admin.user.user_list', compact('user','role_name'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->checkPermission())
            return redirect('home'); 
        
        $user = User::find($id);
        return Response::json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $user = User::find($id);
        return Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');

        $this->validate($request,[ 
            'name' => 'required|string|max:250',
            'email' => 'required|string|max:250',
            'role_id' => 'required',
        ]);

        User::find($request->user_id)->update($request->all());

        return redirect()->route('user.index')->with('success','Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(!$this->checkPermission())
            return redirect('home');
        
        User::find($request->user_id)->delete();

        return redirect()->route('user.index')->with('success','Record Deleted Successfully');
    }
}
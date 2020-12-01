<?php

namespace App\Http\Controllers;

use App\Model\Message;
use App\AppUser;
use Illuminate\Http\Request;

use Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = Message::with(['user'])->orderBy('is_read')->get()->unique('user_id');
        
        return view('admin.chat.chat', compact('message'));
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
        $this->validate($request, [ 
            'users_message' => 'required',
        ]);

        Message::create([
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'user_type' => $request->user_type,
            'is_read' => 1,
            'users_message' => $request->users_message,
        ]);

        Message::where('user_id', $request->user_id)->update([
            'is_read' => 1,            
        ]);

        return redirect()->route('message.index')->with('success', 'Response Send Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $message = Message::with('user')->where('user_id', $id)->get();

        return Response::json($message);
    }

    public function read($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Message::where('user_id', $request->user_id)->delete();

        return redirect()->route('message.index')->with('success', 'Record Deleted Successfully');
    }

}

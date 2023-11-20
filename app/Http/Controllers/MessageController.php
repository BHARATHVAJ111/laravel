<?php

namespace App\Http\Controllers;

use App\Model\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('message');
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
        $chats=$request->validate(['message'=>'required|max:200']);
         
        Message::create([
            'person_id_1'=>auth()->id(),
            'person_id_2'=>$request->id,
            'message'=>$chats['message']

        ]);
return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
          $follower_chats=DB::table('tweety_messages')
          ->where('person_id_1',auth()->user()->id)
          ->where('person_id_2',$user->id)
          ->get();

          $chats_user=DB::table('tweety_messages')
          ->where('person_id_1',$user->id)
          ->where('person_id_2',auth()->user()->id)
          ->get();

          return view('message',['user'=>$user],compact('follower_chats','chats_user'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}

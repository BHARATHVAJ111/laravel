<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profiles.show',[
            'user'=>$user,
            'tweets'=>$user->tweets()->withLikes()->paginate(50),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,User $user)
    {
        // abort_if($user->isNot(current_user()),404);

        // $this->authorize('edit',$user);

        return view('profiles.edit',compact('user'));
    }


    public function update(User $user)
    {
        $attributes=request()->validate([
            'username'=>['string','required','max:255','alpha_dash',Rule::unique('users')->ignore($user)],
            'name'=>['string','required','max:255'],
            'avatar'=>['file'],
            'email'=>['string','required','email','max:255',Rule::unique('users')->ignore($user)],
            'password'=>['string','required','min:8','max:255','confirmed']
        ]);

   if(request('avatar'))
   {
       $attributes['avatar']=request('avatar')->store('avatars');
   }
        $user->update($attributes);

        return redirect($user->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function request()
    {
        return view('request');
    }

}

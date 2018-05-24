<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Auth;
use Session;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request,[

            'name' => 'required',

            'email' => 'required|email',

            'facebook' => 'required|url',

            'youtube' => 'required|url'

            ]);

        $user = Auth::user($id);
       /* $profile = Profile::where('user_id', $user->id)->first();*/

        if($request->hasFile('avatar'))

        {
            $avatar = $request->avatar;

            $avatar_new_name = time(). $avatar->getClientOriginalName();

            $avatar->move('uploads/avatars', $avatar_new_name);


            
        }

        $user->name = $request->name;

        $user->email = $request->email;   

        /*$user->facebook = $request->facebook;

        $user->youtube = $request->youtube;
*/
    

        


        if ($request->has('password')) 
        {
           $user->password = bcrypt($request->password);

           $user->save();
           $user->profile()->create(['avatar'=>$avatar_new_name,'facebook'=>$request->facebook,'youtube'=>$request->youtube, 'about'=>$request->about]);
        } 

        Session::flash('success', 'Account Profile Updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = User::find($id);

        /*$user->profile->delete();*/

        $user->delete();

        Session::flash('success', 'User deleted');

        return redirect()->back();


    }
}

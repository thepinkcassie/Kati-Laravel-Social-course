<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('profiles.profile')
            ->with('user', $user);
    }

    public function edit()
    {
        return view('profiles.edit')->with('info', Auth::user()->profile);
    }

    public function update(Request $r)
    {
        

        $this->validate($r, [
            'location'=> 'required',
            'about'=> 'required|max:75',
            'website'=> 'max:25'
        ]);

        Auth::user()->profile()->update([
            'location'=> $r->location,
            'website'=> $r->website,
            'about'=> $r->about
        ]);

        if($r->hasFile('avatar'))
        {
            Auth::user()->update([
            'avatar' => $r->avatar->store('app/public/avatars')
            ]);
        }

       

        session()->flash('message', 'Profile update was successful!');
        return redirect()->back();
    }
}

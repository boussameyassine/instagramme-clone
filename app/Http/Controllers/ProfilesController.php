<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{

    public function search(Request $request){
        $s = $request->get('search');
        $user = User::where('username','like', '%' . $s . '%')->get();
        $count = User::where('username','like', '%' . $s . '%')->count();
        return view('search',compact('user', 'count'));
    }

    public function index(User $user)
    {
        return view('profile', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('editprofile', compact('user'));
    }

    public  function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = Request()->validate([
            'description' => '',
            'title'=>'',
            'image' => '',

        ]);


        if (request('image')) {

            $imagePath = request('image')->store('profile','public');

            $imageArray = ['image' => $imagePath];
        }



        auth()->user()->profile->update(array_merge(

            $data,
            $imageArray ?? []

        ));

        return redirect ("/profile/{$user->id}");

    }
}

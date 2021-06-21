<?php

namespace App\Http\Controllers;

use App\User_Profile;
use Illuminate\Http\Request;

class UserProfilecontroller extends Controller
{
    function index() {
        $users = User_Profile::all();
        return view('profile', compact('users'));
    }

    function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = new User_Profile();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->save();

        return redirect('user_profile')->with('success', 'Information has been added');
    }
}

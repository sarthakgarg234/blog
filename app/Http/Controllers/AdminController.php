<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    function index() {
        $admins = Admin::get();
        return view('admin', compact('admins'));
    }

    function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $admin = new Admin();
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        $admin->address = $request->get('address');
        $admin->category = $request->get('category');
        $admin->gender = $request->get('gender');
        $admin->save();

        return redirect('admin')->with('success', 'Information has been added');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show(User $user)
    {
        return view('user', compact('user'));
    }

    public function follow(Request $request, User $user)
    {
        if ($request->user()->canFollow($user)) {
            # code...
            $request->user()->following()->attach($user);
        }
        return redirect()->back();
    }

    public function unFollow(Request $request, User $usrr)
    {
        if ($request->user()->canUnFollow($user)) {
            # code...
            $request->user()->following()->detach($user);
        }

        return redirect()->back();
    }
}

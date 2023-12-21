<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            Auth::user()->update(['avatar' => $avatarPath]);
            Auth::user()->save();
        }

        return redirect()->back()->with('success', 'Avatar mis à jour avec succès.');
    }

    public function index(int $id){
        $user = User::find($id);
        return view('user', ["user" => $user]);
    }
}


<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('backend.profile.index');
    }

    public function profile_process(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with('error', "Old password doesn't match!");
        }

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', "New passsword changed successfully.");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth.change-password');
    }

    public function changeName(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('profile')->with('status', 'Data berhasil diganti');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        return redirect()->route('profile')->with('status', 'Data berhasil diganti');
    }
}

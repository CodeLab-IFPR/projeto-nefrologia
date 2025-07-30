<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function editPassword()
    {
        return view('admin.security.edit');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed',
        ]);
        $user = \App\Models\User::find(auth()->id());
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Senha atual incorreta.']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Senha atualizada com sucesso!');
    }
}

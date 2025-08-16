<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RedefinirSenha; // Usando a sua classe de e-mail
class ForgotPasswordController extends Controller
{
    // Exibe o formulário de solicitação de redefinição de senha
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }
    // Envia o link de redefinição de senha por e-mail 
    public function sendResetLinkEmail(Request $request)
    {
        // validação do email 
        $request->validate(['email' => 'required|email']);
        // Verifica se o usuário existe
        $user = User::where('email', $request->email)->first();
        // Caso não encontre o usuário, retorna com erro
        if (!$user) {
            return back()->with(['status' => 'Este e-mail não está cadastrado. verifique se digitou corretamente.']);
        }
        $newPassword = Str::random(8); // Gera uma nova senha aleatória
        $user->password = Hash::make($newPassword); // Salva a senha criptografada
        $user->save(); // Salva as alterações no usuário


        Mail::to($user->email)->send(new RedefinirSenha($newPassword)); // Envia o e-mail com a nova senha
        return redirect()->route('login.form')->with('status', 'Nova senha enviada! Verifique seu e-mail e faça o login.');
    }
}

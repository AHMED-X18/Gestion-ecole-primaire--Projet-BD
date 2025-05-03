<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validation des champs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        // 2. Recherche de l'utilisateur dans la base de données
        $user = Admin::where('email', $request->email)->first();

        // 3. Vérification explicite des credentials
        if (!$user) {
            // Si l'email n'existe pas
            throw ValidationException::withMessages([
                'email' => 'Adresse email incorrecte',
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            // Si le mot de passe ne correspond pas
            throw ValidationException::withMessages([
                'password' => 'Mot de passe incorrect',
            ]);
        }

        // 6. Régénération de la session
        $request->session()->regenerate();

        // Stocker les informations de l'utilisateur dans la session
        session(['admin' => $user]);
        $admin=(session('admin'));

        // 7. Redirection
        return redirect()->intended('/reveal')->with('admin', $admin);
    }

    /**
     * Déconnexion de l'utilisateur
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Détruire les données de session
        $request->session()->forget('admin');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
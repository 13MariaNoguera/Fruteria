<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    
    // FORMULARIO LOGIN
    public function loginForm() {
        return view('auth.login');
    }

    // AUTENTIFICACIÓN DE LOS USUARIOS
    public function login(Request $request) {
        
        $credenciales = $request->only('username', 'password');
        
        if (Auth::attempt($credenciales)) {
            // Autenticación exitosa
            return redirect()->intended(route('fruteria.index'));

        } else {
            
            $error = 'Usuario incorrecto';
            return view('auth.login', compact('error'));
        }
    }

    public function destroy(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('login');

    }
}

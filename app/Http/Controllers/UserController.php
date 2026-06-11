<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class UserController extends Controller
{
    /**
     * Muestra el formulario de login.
     */
    public function loginForm()
    {
        // Recuperamos las categorías para el menú/header tal como hacías en CI4
        $categories = Category::all();

        /* En Laravel no concatenamos vistas con el punto (.). 
         * Lo ideal es llamar a una sola vista y que esta use "Blade Layouts" 
         * para incluir el header y el footer automáticamente.
         */
        return view('frontend.users.login', [
            'categories' => $categories,
            'title' => 'Private Access'
        ]);
    }

    /**
     * Procesa el intento de login.
     */
    public function checkUser(Request $request)
    {
        // 1. Validamos los datos. Al usar la tabla nativa, cambiamos 'username' por 'email'
        $credentials = $request->validate([
            'email'    => 'required|email|min:4|max:255',
            'password' => 'required|min:4|max:5000',
        ], [
            // Mensajes de error personalizados (opcional)
            'email.required' => 'El correo electrónico es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // 2. Intentamos autenticar al usuario (Auth::attempt hace toda la magia por detrás)
        if (Auth::attempt($credentials)) {
            
            // Si el login es correcto, regeneramos la sesión por seguridad (evita Session Fixation)
            $request->session()->regenerate();

            // Redirigimos al panel de administración
            return redirect()->to('/admin/news');
        }

        // 3. Si las credenciales fallan, volvemos atrás con un mensaje de error
        return back()->withErrors([
            'email' => 'El correo electrónico o la contraseña no son correctos.',
        ])->withInput($request->only('email')); // Mantiene el email escrito en el formulario
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function signOut(Request $request)
    {
        // Cierra la sesión en el sistema de autenticación
        Auth::logout();

        // Invalida la sesión del usuario y regenera el token CSRF por seguridad
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige al frontend de noticias
        return redirect()->to('/news');
    }
}
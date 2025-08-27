<?php
namespace App\Authentication\Controllers;

use Illuminate\Http\Request;
use App\WS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\WS\Models\WorkspaceUser;

class AuthCtr extends Controller
{
    // Mostrar login form
    public function showLoginForm()
    { 
        return view('authentication::login_page'); // crea tu blade en resources/views/auth/login.blade.php
    }

    // Procesar login
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'], 
            'password' => ['required', 'string'] ,
        ]); 
        $username =  trim($request->input('username'));
        $password = trim($request->input('password'));
        

        $user = WorkspaceUser::where('username', $username)->first();
        //dd(  Hash::make('admin')  );
        if (!$user || !Hash::check($password, $user->password)) {
            return back()->withErrors([
                'document_number' => 'Credenciales inválidas.',
            ])->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/account/dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }
}

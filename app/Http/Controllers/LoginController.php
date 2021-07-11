<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/admin/sings');
        }
    }

    public function checkLogin()
    {
        if (Auth::check()) {
            return redirect('/admin/sings');
        } else {
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

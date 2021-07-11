<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        User::create(['name' => 'Admin', 'email' => 'dieuhoangphilongit@gmail.com', 'password' => bcrypt('admin@123'), 'is_admin' => 1]);
        // $email = $request->email;
        // $password = $request->password;
        // if (Auth::attempt(['email' => $email, 'password' => $password])) {
        //     return redirect('/admin/sings');
        // }
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

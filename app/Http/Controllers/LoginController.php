<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function login()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->route('dashboard');
        }
        // elseif (Auth::guard('superAdmin')->check()) {
        //     return redirect()->route('admin.dashboard');
        // }
        return view('website.home');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = User::where(function ($query) use ($request) {
            $query->where('mobile', $request->username)->orWhere('email', $request->username);
        })->first();

            $checkPassword = Hash::check($request->password, $user->password);
            if (!$checkPassword) {
                return redirect()->back()->withInput($request->only('username'))->with([
                    'status'  => 'error',
                    'message' => 'These credentials do not match our records',
                ]);
            }

            $authGuard = 'user';
            User::where('id', $user->id)->update(['last_login_date' => now()]);
            if ($user->role == 'admin') {
                return redirect()->route('admin.panel');
            }
            return redirect()->route('dashboard');
      
    }

    public function logout()
    {
        $authGuard = 'user';
        auth()->guard($authGuard)->logout();
        return redirect()->route('home');
    }

    public function adminLogout()
    {
        $authGuard = 'admin';
        auth()->guard($authGuard)->logout();
        return redirect()->route('home');
    }
    
}

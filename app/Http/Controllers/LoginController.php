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
            return redirect()->route('home');
        }
        elseif (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('website.login2');
    }

    public function loginSubmit(Request $request)
    {
        // dd($request);
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::where(function ($query) use ($request) {
            $query->where('mobile', $request->username)->orWhere('email', $request->username);
        })->first();

        if ($user) {
            $checkPassword = Hash::check($request->password, $user->password);
            if ($checkPassword) {

                $authGuard = 'user';
                if ($user->role == 'admin') {
                    $authGuard = 'admin';
                }

                Auth::guard($authGuard)->login($user);

                User::where('id', $user->id)->update(['last_access_at' => now()]);
                Session::put(['firstname' => $user->firstname, 'username' => $user->mobile, 'id' => $user->id, 'role' => $user->role]);
                if ($user->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->role == 'user') {
                    return redirect()->route('home');
                }
            } else {
                return redirect()->back()->withInput($request->only('username'))->with([
                    'status'  => 'error',
                    'message' => 'Credentials do not match', //__('locale.auth.failed'),
                ]);
            }
        } else {
            return redirect()->back()->withInput($request->only('username'))
                ->with([
                    'status'  => 'error',
                    'message' => 'These credentials do not match our records.'
                ]);
        }
    }

    public function logout(Request $request){
        Auth::logout(); // Log out the user

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('home');//view('home'); //redirect()->route('/');
}

      //Below code also work for login

    // protected function attemptLogin(Request $request)
    // {
    //     $credentials = $request->only('username', 'password');
    //     // dd($credentials);

    //     // Check if user exists with provided email/mobile and password
    //     if (Auth::attempt($credentials)) {
    //         // Redirect based on user role
    //         if (Auth::user()->role == 'admin') {
    //             return redirect()->route('admin.dashboard');
    //         } elseif (Auth::user()->role == 'user') {
    //             return redirect()->route('home');
    //         }
    //     }

    //     return false;
    // }

}

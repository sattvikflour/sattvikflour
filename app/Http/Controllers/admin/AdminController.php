<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function adminLogout(Request $request){
            Auth::logout(); // Log out the user
    
            $request->session()->invalidate(); // Invalidate the session
            $request->session()->regenerateToken(); // Regenerate CSRF token
    
            return redirect()->route('home');//view('home'); //redirect()->route('/');
    }
}

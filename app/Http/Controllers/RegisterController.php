<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function registrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard'); // Change 'dashboard' to your actual dashboard route
        }
        return view('website.register');
    }

    public function registerSubmit(Request $request)
    {
        //dd($request->all());
        // Validation
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Optionally, you can log in the user here if you want

        // Redirect to a success view
        return view('website.login');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:20', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'city' => 'Pune',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'address' => $data['address'],
            'city' => $data['city'],
            'password' => Hash::make($data['password']),        
        ]);
    }

}

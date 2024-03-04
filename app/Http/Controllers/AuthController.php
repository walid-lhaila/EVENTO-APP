<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function registerStore(Request $request)
    {
        $attributes = $request->validate([
        'fname' => 'required|min:4',
        'lname' => 'required|min:4',
        'phone' => 'required',
        'role' => 'required',
        'email' => 'required',
        'password' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fileName = time() . '.' . $request->image->extension(); // Corrected typo
        $request->image->storeAs('public/images', $fileName);
        $attributes = array_merge($attributes, ['image' => $fileName]);

        $user = new User([
           'fname' => $attributes['fname'],
           'lname' => $attributes['lname'],
           'phone' => $attributes['phone'],
           'role' => $attributes['role'],
           'email' => $attributes['email'],
            'password' => Hash::make($attributes['password']),
            'image' => $attributes['image'],
        ]);
        $user->save();
        return view('login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        $user = auth()->user();

        session()->regenerate();

        $redirect = 'login'; // Default redirect

        switch ($user->role) {
            case 'admin':
                $redirect = 'admin.dashboard';
                break;
            case 'client':
                $redirect = 'client.event';
                break;
            case 'organisateur':
                $redirect = 'organisateur.home';
                break;
        }

        return redirect()->route($redirect);
    }






    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }
}

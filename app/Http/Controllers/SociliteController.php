<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SociliteController extends Controller
{
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if the user with this email already exists
            $existingUser = User::where('email', $googleUser->email)->first();

            if ($existingUser) {
                // If the user exists, log them in
                Auth::login($existingUser);
            } else {
                // If the user doesn't exist, create a new user
                $name = explode(' ', $googleUser->name);
                $password = Hash::make($googleUser->name . $googleUser->id);
                $user = User::create([
                    'fname' => $name[0],
                    'lname' => $name[1] ?? '',
                    'role' => 'client',
                    'email' => $googleUser->email,
                    'password' => $password,
                ]);

                // Log in the newly created user
                Auth::login($user);
            }

            return redirect()->route('client.event');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}



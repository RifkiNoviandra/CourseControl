<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack()
    {

        $userData = Socialite::driver('google')->user();
        $user = User::where('email', $userData->email)->first();
        if ($user != null) {
            if ($user->role_id == 1) {
                Auth::login($user);
                return redirect()->intended('admin/dashboard');
            } else if ($user->role_id == 2) {
                Auth::login($user);
                return redirect()->intended('student');
            } else if ($user->role_id == 3) {
                Auth::login($user);
                return redirect()->intended('instructor');
            } else {
                return redirect()->intended('login');
            }
        } else {
            $user = User::create([
                'full_name' => $userData->name,
                'username' => ucfirst(Str::slug($userData->name)),
                'email' => $userData->email,
                'password' => Hash::make(Str::random(12)),
                'profile_picture' => $userData->avatar,
                'provider_id' => $userData->id,
            ]);
            $user->status = 'active';
            $user->is_email_verified = true;
            $user->markEmailAsVerified();

            Auth::login($user);
            return redirect()->route('login')->with('status', "Congratulation! Now you are student at Basicschool.");
        }
    }
}

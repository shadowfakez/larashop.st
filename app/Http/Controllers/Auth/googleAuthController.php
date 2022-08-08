<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class googleAuthController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            $isCurrentUser = User::where('email', $user->getEmail())->first();
            $isUser = User::where('google_id', $user->getId())->first();
            if ($isCurrentUser) {
                if ($isUser) {
                    Auth::login($isUser, true);
                    return redirect()->route('home');
                } else {
                    $isCurrentUser->update(['google_id' => $user->getId()]);
                    Auth::login($isCurrentUser, true);
                    return redirect()->route('home');
                }
            } else {
                $createUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => encrypt($user->getName()),
                ]);

                Auth::login($createUser, true);
                return redirect()->route('home');
            }
        } catch(\Throwable $exception) {
            throw $exception;
        }
    }
}

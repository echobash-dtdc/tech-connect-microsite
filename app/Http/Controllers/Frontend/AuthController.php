<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToKeycloak()
    {
        return Socialite::driver('keycloak')->redirect();
    }

    public function handleKeycloakCallback()
    {
        $keycloakUser = Socialite::driver('keycloak')->user();
        $user = User::createOrUpdateFromKeycloak($keycloakUser);
        auth()->login($user);

        return redirect()->intended('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
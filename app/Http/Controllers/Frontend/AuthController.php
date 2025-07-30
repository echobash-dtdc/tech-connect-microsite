<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function redirectToKeycloak(): RedirectResponse
    {
        // If already authenticated in Laravel, just redirect home
        if (auth()->check()) {
            return redirect('/');
        }

        $socialite = Socialite::driver('keycloak');
        return $socialite->redirect();
    }

    public function handleKeycloakCallback(): RedirectResponse
    {
        $keycloakUser = Socialite::driver('keycloak')->user();

        // Get the full access token response
        $tokenResponse = $keycloakUser->accessTokenResponseBody;

        // Extract the ID token from the response if available
        $idToken = $tokenResponse['id_token'] ?? null;

        // Store ID token in session for logout use
        if ($idToken) {
            session(['keycloak_id_token' => $idToken]);
        }

        $user = User::createOrUpdateFromKeycloak($keycloakUser);
        auth()->login($user);

        return redirect()->intended('/');
    }

    public function logout(): RedirectResponse
    {
        $idToken = session()->pull('keycloak_id_token');

        auth()->logout();

        $logoutUrl = config('services.keycloak.logout_url');

        if ($idToken) {
            $logoutUrl .= '?' . http_build_query([
                'id_token_hint' => $idToken,
                'post_logout_redirect_uri' => config('app.url')
            ]);
        }

        return redirect()->away($logoutUrl);
    }
}
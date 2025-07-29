<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToKeycloak()
    {
        // If already authenticated in Laravel, just redirect home
        if (auth()->check()) {
            return redirect('/');
        }

        // If ?force=1 is in URL, force re-authentication at Keycloak
        $socialite = Socialite::driver('keycloak');

        // if (request()->query('force')) {
        //     $socialite = $socialite->with(['prompt' => 'login']);
        // }

        return $socialite->redirect();
    }

    public function handleKeycloakCallback()
{
    $keycloakUser = Socialite::driver('keycloak')->user();
// dd($keycloakUser);
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

    public function logout()
{
    $idToken = session()->pull('keycloak_id_token');

    auth()->logout();
    session()->invalidate();
    session()->regenerateToken();

    $logoutUrl = config('services.keycloak.logout_url');

    if ($idToken) {
        $logoutUrl .= '?' . http_build_query([
            'id_token_hint' => $idToken,
            'post_logout_redirect_uri' => config('app.url'), // e.g., http://localhost:1111
        ]);
    }

    return redirect()->away($logoutUrl);
}
}
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

        // Clear any existing session state to prevent conflicts
        session()->forget('_token');
        session()->forget('state');

        $socialite = Socialite::driver('keycloak');
        return $socialite->redirect();
    }

    public function handleKeycloakCallback(): RedirectResponse
    {
        try {
            $keycloakUser = Socialite::driver('keycloak')->user();
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            \Log::error('Invalid state exception in Keycloak callback: ' . $e->getMessage());
            session()->flush();
            try {
                $keycloakUser = Socialite::driver('keycloak')->stateless()->user();
            } catch (\Exception $statelessException) {
                \Log::error('Stateless authentication also failed: ' . $statelessException->getMessage());
                return redirect('/login')->with('error', 'Authentication session expired. Please try logging in again.');
            }
        } catch (\Exception $e) {
            \Log::error('Keycloak callback error: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Authentication failed. Please try again.');
        }

        // At this point, $keycloakUser is set
        $tokenResponse = $keycloakUser->accessTokenResponseBody ?? [];
        $idToken = $tokenResponse['id_token'] ?? null;

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
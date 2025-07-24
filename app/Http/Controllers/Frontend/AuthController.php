<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /**
     * Show the custom login page for Keycloak SSO.
     */
    public function showLoginForm()
    {
        return view('frontend.login');
    }
}
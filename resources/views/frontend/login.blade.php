@extends('frontend.front-layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h2 class="mb-4">Sign in with SSO</h2>
                        <p class="mb-4">Click the button below to sign in using your organization account via Keycloak.</p>
                        <a href="{{ route('keycloak.login') }}" class="btn btn-primary btn-lg">Sign in with Keycloak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
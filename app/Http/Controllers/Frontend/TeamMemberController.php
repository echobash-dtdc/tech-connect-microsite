<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class TeamMemberController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", ENV('BASEROW_DB_TOKEN'))
        ])->get('https://resolved-silkworm-eminent.ngrok-free.app/api/database/rows/table/778/?user_field_names=true');

        $teamMembers = $response->json()['results'] ?? [];
        return view('frontend.team_members.index', compact('teamMembers'));
    }
}

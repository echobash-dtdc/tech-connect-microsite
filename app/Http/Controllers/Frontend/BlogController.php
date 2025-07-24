<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class BlogController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", ENV('BASEROW_DB_TOKEN'))
        ])->get('https://resolved-silkworm-eminent.ngrok-free.app/api/database/rows/table/777/?user_field_names=true');

        $blogs = $response->json()['results'] ?? [];
        return view('frontend.blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", ENV('BASEROW_DB_TOKEN'))
        ])->get("https://resolved-silkworm-eminent.ngrok-free.app/api/database/rows/table/777/$id/?user_field_names=true");
        $blog = $response->json() ?? [];
        if (!$blog) {
            abort(404);
        }
        return view('frontend.blogs.show', compact('blog'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function courses()
    {
        return view('frontend.blogs.index');
    }

    public function events()
    {
        return view('frontend.events');
    }

    public function trainers()
    {
        return view('frontend.trainers');
    }

    public function pricing()
    {
        return view('frontend.pricing');
    }

    public function feedback()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://resolved-silkworm-eminent.ngrok-free.app/api/database/fields/table/779/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Token 4JAQ3YaOALoaGoZ7XBeTNEstfKEmeeFh',
                'Cookie: i18n-language=en'
            ]
        ]);
        $response = curl_exec($curl);
        curl_close($curl);

        $fields = json_decode($response, true);
        $topics = [];
        foreach ($fields as $field) {
            if ($field['name'] === 'topics' && isset($field['select_options'])) {
                foreach ($field['select_options'] as $option) {
                    $topics[$option['id']] = $option['value'];
                }
            }
        }

        return view('frontend.feedback', compact('topics'));
    }
}

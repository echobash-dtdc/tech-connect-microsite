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
        $blogs = [
            [
                'id' => 1,
                'image' => 'mentor/img/course-1.jpg',
                'category' => 'Data Streaming',
                'price' => '',
                'title' => 'Introduction to Apache Kafka: Real-Time Data Streaming',
                'description' => 'Explore the fundamentals of Apache Kafka, a distributed event streaming platform. Learn how Kafka enables real-time data pipelines, its architecture, and common use cases in modern applications.',
                'author_image' => 'mentor/img/trainers/trainer-1-2.jpg',
                'author_name' => 'Antonio',
                'users_count' => 50,
                'likes_count' => 65,
            ],
            [
                'id' => 2,
                'image' => 'mentor/img/course-2.jpg',
                'category' => 'API Security',
                'price' => '',
                'title' => 'Understanding API Rate Limiting: Protecting Your Services',
                'description' => 'Discover why rate limiting is essential for APIs. This blog covers strategies to prevent abuse, common implementation patterns, and how to balance user experience with security.',
                'author_image' => 'mentor/img/trainers/trainer-2-2.jpg',
                'author_name' => 'Lana',
                'users_count' => 35,
                'likes_count' => 42,
            ],
            [
                'id' => 3,
                'image' => 'mentor/img/course-3.jpg',
                'category' => 'Web Security',
                'price' => '',
                'title' => 'OWASP Top 10: Essential Web Application Security Risks',
                'description' => 'Get familiar with the OWASP Top 10, a standard awareness document for developers and security professionals. Learn about the most critical web application security risks and how to mitigate them.',
                'author_image' => 'mentor/img/trainers/trainer-3-2.jpg',
                'author_name' => 'Brandon',
                'users_count' => 20,
                'likes_count' => 85,
            ],
        ];

        $blog = collect($blogs)->firstWhere('id', (int)$id);
        if (!$blog) {
            abort(404);
        }
        return view('frontend.blogs.show', compact('blog'));
    }
}

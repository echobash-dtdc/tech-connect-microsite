<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;

class BlogServices extends BaseRowApiServices
{
    private string $blogTableId;
    public function __construct()
    {
        parent::__construct();
        $this->blogTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::BLOG_POSTS];
    }
    public function getAllBlog(): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => sprintf("Token %s", $this->token)
            ])->get($this->baseUrl . '/api/database/rows/table/' . $this->blogTableId . '/?user_field_names=true');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            abort(500, 'Failed to fetch blog posts. HTTP Error: ' . $message);
        }
        $blogs = $response->json()['results'] ?? [];
        return $blogs;

    }
    public function getBlogBySlug(string $slug)
    {
        $filter_field_id = BaseRowTableIdEnum::getSlugFilterField()[BaseRowTableIdEnum::BLOG_POSTS];
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", $this->token)
        ])->get($this->baseUrl . '/api/database/rows/table/' . $this->blogTableId . '/?user_field_names=true&filter__field_' . $filter_field_id . '__equal=' . $slug);
        $blog = $response->json()['results'][0] ?? [];
        if (!$blog) {
            abort(404);
        }
        return $blog;
    }
    // New function to fetch latest blogs by id descending
    public function getLatestBlogs($count = 3): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => sprintf("Token %s", $this->token)
            ])->get($this->baseUrl . '/api/database/rows/table/' . $this->blogTableId . '/?user_field_names=true&order_by=-created_at&page=1&size=' . $count);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            abort(500, 'Failed to fetch blog posts. HTTP Error: ' . $message);
        }
        $blogs = $response->json()['results'] ?? [];
        return $blogs;
    }
}
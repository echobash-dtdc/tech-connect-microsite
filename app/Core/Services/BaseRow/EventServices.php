<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;

class EventServices extends BaseRowApiServices
{
    private string $eventTableId;
    public function __construct()
    {
        parent::__construct();
        $this->eventTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::EVENTS];
    }
    public function getAllEvents(int $page = 1, int $pageSize = 10): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Token ' . $this->token,
                'Cookie' => 'mailpoet_page_view=%7B%22timestamp%22%3A1751975963%7D'
            ])->get($this->baseUrl . '/api/database/rows/table/' . $this->eventTableId . '/?user_field_names=true&page=' . $page . '&size=' . $pageSize);

            $data = $response->json();
            if (!$response->successful()) {
                throw new \Exception('Failed to fetch events: ' . $response->body());
            }
            // Return both results and pagination info
            return [
                'results' => $data['results'] ?? [],
                'count' => $data['count'] ?? 0,
                'next' => $data['next'] ?? null,
                'previous' => $data['previous'] ?? null,
                'page' => $page,
                'pageSize' => $pageSize
            ];
        } catch (\Illuminate\Http\Client\RequestException $e) {
            throw new \Exception('Curl error: ' . $e->getMessage());
        }
    }

}
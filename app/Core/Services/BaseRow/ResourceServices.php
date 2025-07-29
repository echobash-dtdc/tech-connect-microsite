<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;

class ResourceServices extends BaseRowApiServices
{
    private string $resourceTableId;
    public function __construct()
    {
        parent::__construct();
        $this->resourceTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::RESOURCES_TOOLS];
    }
    public function getAllResources(int $page = 1, int $pageSize = 10): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Token ' . $this->token,
                'Cookie' => 'mailpoet_page_view=%7B%22timestamp%22%3A1751975963%7D'
            ])->get($this->baseUrl . '/api/database/rows/table/' . $this->resourceTableId . '/?user_field_names=true&page=' . $page . '&size=' . $pageSize);

            $data = $response->json();
            if (!$response->successful()) {
                throw new \Exception('Failed to fetch resources: ' . $response->body());
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
    public function getResourceById(int $id)
    {
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", $this->token)
        ])->get($this->baseUrl . '/api/database/rows/table/' . $this->resourceTableId . '/' . $id . '/?user_field_names=true');
        $resource = $response->json() ?? [];
        if (!$resource) {
            abort(404);
        }
        return $resource;
    }
    public function getDownloadFile(int $id)
    {
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", $this->token)
        ])->get($this->baseUrl . '/api/database/rows/table/' . $this->resourceTableId . '/' . $id . '/?user_field_names=true');
        $resources = $response->json() ?? [];
        // $resources = ENV('BASEROW_DOMAIN') . $resources['resource_file'][0]['url'] ?? '';
        if (!$resources) {
            abort(404);
        }
        // Check if the resource file exists
        if (!isset($resources['documentation']) || empty($resources['documentation'])) {
            abort(404, 'Resource file not found');
        }
        // Assuming resource_file is a URL or path to the file
        $resourceFile = $resources['documentation'][0]['url'] ?? '';
        if (!$resourceFile) {
            abort(404, 'Resource file URL is empty');
        }
        // Return the resource file for download
        $reponse = [
            'resource_file' => $resourceFile,
            'resource_name' => $resources['documentation'][0]['name'] ?? 'download',
            'file_extension' => pathinfo($resourceFile, PATHINFO_EXTENSION)
        ];
        // dd($reponse);
        return $reponse;

    }
}
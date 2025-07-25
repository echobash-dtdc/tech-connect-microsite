<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;

class ProjectServices extends BaseRowApiServices
{
    private string $projectTableId;
    public function __construct()
    {
        parent::__construct();
        $this->projectTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::PROJECTS];
    }
    public function getAllProjects(): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => sprintf("Token %s", $this->token)
            ])->get($this->baseUrl . '/api/database/rows/table/' . $this->projectTableId . '/?user_field_names=true');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            abort(500, 'Failed to fetch project lists. HTTP Error: ' . $message);
        }

        $projects = $response->json()['results'] ?? [];
        return $projects;

    }
    public function getProjectById(int $id)
    {
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", $this->token)
        ])->get($this->baseUrl . '/api/database/rows/table/' . $this->projectTableId . '/' . $id . '/?user_field_names=true');
        $project = $response->json() ?? [];
        if (!$project) {
            abort(404);
        }
        return $project;
    }
}
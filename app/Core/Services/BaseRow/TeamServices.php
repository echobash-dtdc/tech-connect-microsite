<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;

class TeamServices extends BaseRowApiServices
{
    private string $teamMembersTableId;
    public function __construct()
    {
        parent::__construct();
        $this->teamMembersTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::TEAM_MEMBERS];
    }
    public function getAllTeamMembers(): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => sprintf("Token %s", $this->token)
            ])->get($this->baseUrl . '/api/database/rows/table/' . $this->teamMembersTableId . '/?user_field_names=true');

            if (!$response->successful()) {
                throw new \Exception('API Error: ' . ($response->json()['error'] ?? $response->body()));
            }
        } catch (\Exception $e) {
            // You can log the error or handle it as needed
            return ['error' => $e->getMessage()];
        }


        $teamMembers = $response->json()['results'] ?? [];
        return $teamMembers;
    }

}
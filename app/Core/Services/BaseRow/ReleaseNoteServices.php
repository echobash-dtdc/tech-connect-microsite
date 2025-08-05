<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;

class ReleaseNoteServices extends BaseRowApiServices
{
    private string $releaseNoteTableId;
    public function __construct()
    {
        parent::__construct();
        $this->releaseNoteTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::RELEASE_NOTES];
    }
    public function getAllReleaseNotes(): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => sprintf("Token %s", $this->token)
            ])->get($this->baseUrl . '/api/database/rows/table/' . $this->releaseNoteTableId . '/?user_field_names=true');

            if (!$response->successful()) {
                throw new \Exception('API Error: ' . ($response->json()['error'] ?? $response->body()));
            }
        } catch (\Exception $e) {
            // You can log the error or handle it as needed
            return ['error' => $e->getMessage()];
        }
        $releaseNotes = $response->json()['results'] ?? [];
        return $releaseNotes;
    }

}
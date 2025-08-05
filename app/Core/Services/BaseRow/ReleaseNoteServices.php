<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;
use App\Core\Services\BaseRow\TeamServices;

class ReleaseNoteServices extends BaseRowApiServices
{
    private string $releaseNoteTableId;
    private TeamServices $teamServices;
    public function __construct()
    {
        parent::__construct();
        $this->releaseNoteTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::RELEASE_NOTES];
        $this->teamServices = new TeamServices();
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
        if (empty($releaseNotes)) {
            return [];
        }

        foreach ($releaseNotes as &$note) {
            $note['author_info'] = [];
            if (isset($note['author'][0]['id'])) {
                $authorId = $note['author'][0]['id'];
                $author_info = $this->teamServices->getTeamMemberById($authorId);
                if (isset($author_info['full_name'])) {
                    $note['author_info']['author_full_name'] = $author_info['full_name'];
                    $note['author_info']['author_id'] = $authorId;
                } else {
                    $note['author_info']['author_full_name'] = null;
                    $note['author_info']['author_id'] = null;
                }
            }
        }
        return $releaseNotes;
    }

    public function getReleaseNoteBySlug(string $slug)
    {
        $filter_field_id = BaseRowTableIdEnum::getSlugFilterField()[BaseRowTableIdEnum::RELEASE_NOTES];
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", $this->token)
        ])->get($this->baseUrl . '/api/database/rows/table/' . $this->releaseNoteTableId . '/?user_field_names=true&filter__field_' . $filter_field_id . '__equal=' . $slug);
        $releaseNote = $response->json()['results'][0] ?? [];
        if (!$releaseNote) {
            abort(404);
        }
        return $releaseNote;
    }

}
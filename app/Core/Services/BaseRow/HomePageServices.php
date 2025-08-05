<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;
use App\Core\Services\BaseRow\TeamServices;

class HomePageServices extends BaseRowApiServices
{
    private string $leadershipMessageTableId;
    private TeamServices $teamServices;
    public function __construct()
    {
        parent::__construct();
        $this->leadershipMessageTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::LEADERSHIP_MESSAGE];
        $this->teamServices = new TeamServices();
    }
    public function getActiveLeadershipMessage(): array
    {
        $filter_field_id = BaseRowTableIdEnum::getFilterFieldIds()[BaseRowTableIdEnum::LEADERSHIP_MESSAGE];
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", $this->token)
        ])->get($this->baseUrl . '/api/database/rows/table/' . $this->leadershipMessageTableId . '/?user_field_names=true&filter__field_' . $filter_field_id . '__equal=true');
        $leadershipMessage = $response->json()['results'][0] ?? [];
        if (!$leadershipMessage) {
            abort(404);
        }
        $authorId = null;
        $leadershipMessage['author_info'] = [];
        if (isset($leadershipMessage['author'][0]['id'])) {
            $authorId = $leadershipMessage['author'][0]['id'];

            $author_info = $this->teamServices->getTeamMemberById($authorId);

            if (isset($author_info['photo'][0]['url'])) {
                $author_info['author_photo_url'] = $author_info['photo'][0]['url'];
            } else {
                $author_info['author_photo_url'] = null;
            }
        }
        $leadershipMessage['author_info'] = $author_info;
        return $leadershipMessage;
    }
}
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
    public function getActiveLeadershipMessage()
    {
        $filter_field_id = BaseRowTableIdEnum::getFilterFieldIds()[BaseRowTableIdEnum::LEADERSHIP_MESSAGE];
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", $this->token)
        ])->get($this->baseUrl . '/api/database/rows/table/' . $this->leadershipMessageTableId . '/?user_field_names=true&filter__field_' . $filter_field_id . '__equal=true');
        $leadershipMessage = $response->json() ?? [];
        $authorId = null;
        if (
            isset($leadershipMessage['results'][0]['author'][0]['id'])
        ) {
            $authorId = $leadershipMessage['results'][0]['author'][0]['id'];
        }


        // dd($leadershipMessage);

        if (!$leadershipMessage['count']) {
            abort(404);
        }
        return $leadershipMessage;
    }
}
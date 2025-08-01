<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;

class OrganisationServices extends BaseRowApiServices
{
    private string $organisationTableId;
    public function __construct()
    {
        parent::__construct();
        $this->organisationTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::ORGANISATION];
    }
    public function getActiveOrganisation()
    {
        $filter_field_id = BaseRowTableIdEnum::getFilterFieldIds()[BaseRowTableIdEnum::ORGANISATION];
        $response = Http::withHeaders([
            'Authorization' => sprintf("Token %s", $this->token)
        ])->get($this->baseUrl . '/api/database/rows/table/' . $this->organisationTableId . '/?user_field_names=true&filter__field_' . $filter_field_id . '__equal=true');
        $organisation = $response->json() ?? [];
        if (!$organisation['count']) {
            abort(404);
        }
        return $organisation;
    }
}
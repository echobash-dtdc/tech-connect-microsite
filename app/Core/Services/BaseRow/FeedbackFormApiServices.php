<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;

class FeedbackFormApiServices extends BaseRowApiServices
{
    private string $feedbackTableId;
    public function __construct()
    {
        parent::__construct();
        $this->feedbackTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::FEEDBACK];
    }
    public function getFeedbackTopics(): array
    {
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $this->token,
            'Cookie' => 'i18n-language=en'
        ])->get($this->baseUrl . '/api/database/fields/table/' . $this->feedbackTableId . '/');

        $fields = $response->json();
        $topics = [];
        foreach ($fields as $field) {
            if ($field['name'] === 'topics' && isset($field['select_options'])) {
                foreach ($field['select_options'] as $option) {
                    $topics[$option['id']] = $option['value'];
                }
            }
        }
        return $topics;
    }
    public function saveFeedbackFormData()
    {

    }
}
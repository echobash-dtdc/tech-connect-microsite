<?php
namespace App\Core\Services\BaseRow;
use App\Core\Services\BaseRow\BaseRowApiServices;
use Illuminate\Support\Facades\Http;
use App\Core\Enums\BaseRowTableIdEnum;

class FeedbackFormServices extends BaseRowApiServices
{
    private string $feedbackTableId;
    public function __construct()
    {
        parent::__construct();
        $this->feedbackTableId = BaseRowTableIdEnum::getAllTableIds()[BaseRowTableIdEnum::FEEDBACK];
    }
    public function getFeedbackTopics(): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Token ' . $this->token,
                'Cookie' => 'i18n-language=en'
            ])->get($this->baseUrl . '/api/database/fields/table/' . $this->feedbackTableId . '/');

            $fields = $response->json();
        } catch (\Illuminate\Http\Client\RequestException $e) {
            throw new \Exception('Curl error: ' . $e->getMessage());
        }
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
    public function saveFeedbackFormData($data)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $this->token,
            'Content-Type' => 'application/json'
        ])->post(
                $this->baseUrl . '/api/database/rows/table/' . $this->feedbackTableId . '/?user_field_names=true',
                $data
            );

        if ($response->successful()) {
            return [
                'success' => true,
                'message' => 'Your message has been sent. Thank you!',
                'data' => $response->json()
            ];
        } else {
            $error = $response->json('detail') ?? $response->body();
            return [
                'success' => false,
                'message' => $error
            ];
        }
    }
}
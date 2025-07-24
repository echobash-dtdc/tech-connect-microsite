<?php
namespace App\Core\Services\BaseRow;
class BaseRowApiServices
{
    protected string $baseUrl;
    protected string $token;
    public function __construct()
    {
        $this->baseUrl = env('BASEROW_DOMAIN', 'https://resolved-silkworm-eminent.ngrok-free.app');
        $this->token = env('BASEROW_DB_TOKEN', 'your_default_token_here');
    }
}
?>
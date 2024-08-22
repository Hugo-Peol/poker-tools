<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIChatClient
{
    private $apiKey;
    private $apiUrl;

    public function __construct(string $apiKey, string $apiUrl)
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
    }

    public function post(array $data): array
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, $data);

        return $response->json();
    }
}

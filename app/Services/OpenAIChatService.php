<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Michelf\Markdown;

class OpenAIChatService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = env('OPEN_AI_KEY'); // A chave da API deve estar no arquivo .env
        $this->apiUrl = env('OPEN_AI_API_URL'); // Endpoint para chat completions
    }

    public function generateResponse($messages)
    {
        $configChat = 'Você é um jogador profissional de poker, preciso que analise minha mão, faça criticas e sugestões sobre a jogada. Mão:';
        $sendToChat = $configChat . $messages;
        $content =
        [
            [
                'role' => 'system',
                'content' => 'You are a helpful assistant.'
            ],
            [
                'role' => 'user',
                'content' => $sendToChat
            ]
        ];



        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, [
            'model' => 'gpt-4o-mini',
            'messages' => $content,
        ]);

        // Decode the JSON response
        $responseData = $response->json();

        // Access the 'content' from the 'choices' array
        if (isset($responseData['choices'][0]['message']['content'])) {
            $content = $responseData['choices'][0]['message']['content'];
            $markdown = new Markdown();
            $content = isset($responseData['choices'][0]['message']['content']) ? $responseData['choices'][0]['message']['content'] : '';

            return $markdown->transform($content);
        } else {
            // Handle the case where the 'content' is not found
            dd('Content not found');
        }

    }
}

<?php

namespace App\Services;
use App\Services\Contracts\OpenAIChatServiceInterface;

class OpenAIChatService implements OpenAIChatServiceInterface
{
    private $client;
    private $markdownConverter;
    private $configChat;

    public function __construct(OpenAIChatClient $client, MarkdownConverter $markdownConverter)
    {
        $this->client = $client;
        $this->markdownConverter = $markdownConverter;
        $this->configChat = 'Você é um jogador profissional de poker, preciso que analise minha mão, faça críticas e sugestões sobre a jogada. Mão:';
    }

    public function generateResponse(string $messages): string
    {
        $sendToChat = $this->configChat . $messages;
        $content = [
            [
                'role' => 'system',
                'content' => 'You are a helpful assistant.'
            ],
            [
                'role' => 'user',
                'content' => $sendToChat
            ]
        ];

        $responseData = $this->client->post([
            'model' => 'gpt-4o-mini',
            'messages' => $content,
        ]);

        return $this->extractContent($responseData);
    }

    private function extractContent(array $responseData): string
    {
        if (isset($responseData['choices'][0]['message']['content'])) {
            $content = $responseData['choices'][0]['message']['content'];
            return $this->markdownConverter->convert($content);
        }

        return 'Content not found';
    }
}

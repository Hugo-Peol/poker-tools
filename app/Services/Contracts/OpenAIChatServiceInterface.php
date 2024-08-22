<?php

namespace App\Services\Contracts;


interface OpenAIChatServiceInterface
{
    public function generateResponse(string $messages): string;
}

<?php

namespace App\Services;

use Michelf\Markdown;

class MarkdownConverter
{
    public function convert(string $markdownText): string
    {
        $parser = new Markdown();
        return $parser->transform($markdownText);
    }
}

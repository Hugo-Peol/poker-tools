<?php

namespace App\Providers;

use App\Services\Contracts\OpenAIChatServiceInterface;
use App\Services\MarkdownConverter;
use App\Services\OpenAIChatClient;
use App\Services\OpenAIChatService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(OpenAIChatClient::class, function ($app) {
            return new OpenAIChatClient(
                env('OPEN_AI_KEY'),
                env('OPEN_AI_API_URL')
            );
        });

        $this->app->singleton(MarkdownConverter::class, function ($app) {
            return new MarkdownConverter();
        });

        $this->app->singleton(OpenAIChatServiceInterface::class, function ($app) {
            return new OpenAIChatService(
                $app->make(OpenAIChatClient::class),
                $app->make(MarkdownConverter::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

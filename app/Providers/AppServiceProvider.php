<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Handle Google Credentials for Render/Serverless
        if ($json = env('GOOGLE_SHEETS_CREDENTIALS')) {
            $path = storage_path('app/google-credentials.json');
            // Always overwrite to ensure latest credentials
            file_put_contents($path, $json);
            // Ensure config uses this path (though we set it in config/google.php, this confirms it exists)
        }
    }
}

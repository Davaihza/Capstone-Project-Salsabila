<?php

return [
    'application_name' => env('GOOGLE_APPLICATION_NAME', 'Laravel'),
    'client_id' => env('GOOGLE_CLIENT_ID', ''),
    'client_secret' => env('GOOGLE_CLIENT_SECRET', ''),
    'redirect_uri' => env('GOOGLE_REDIRECT', ''),
    'scopes' => [\Google\Service\Sheets::DRIVE, \Google\Service\Sheets::SPREADSHEETS],
    'access_type' => 'offline',
    'approval_prompt' => 'auto',
    'prompt' => 'consent',
    'service' => [
        'enable' => true,
        'file' => storage_path('app/google-credentials.json'),
    ],
    // Custom keys for application logic
    'post_spreadsheet_id' => env('GOOGLE_SHEETS_ID'),
    'post_sheet_id' => env('GOOGLE_SHEETS_RANGE', 'Sheet1'),
];

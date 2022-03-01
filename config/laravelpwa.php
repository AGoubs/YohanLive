<?php

return [
    'name' => 'Event',
    'manifest' => [
        'name' => env('APP_NAME', 'Event'),
        'short_name' => 'PWA',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icons/100.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/images/icons/128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/images/icons/152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/196.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/images/icons/256.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
          '240x320' => '/images/icons/splash-port-ldpi.png',
          '320x480' => '/images/icons/splash-port-mdpi.png',
          '480x800' => '/images/icons/splash-port-hdpi.png',
          '720x1280' => '/images/icons/splash-port-xhdpi.png',
          '960x1600' => '/images/icons/splash-port-xxhdpi.png',
          '1280x1920' => '/images/icons/splash-port-xxxhdpi.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];

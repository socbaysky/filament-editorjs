<?php

// config for Athphane/FilamentEditorjs
return [
    'profiles' => [
        'default' => [
            'header', 'image', 'delimiter', 'list', 'underline', 'quote', 'table',
        ],
        'pro' => [
            'header', 'image', 'delimiter', 'list', 'underline', 'quote', 'table',
            'raw', 'code', 'inline-code', 'style',
        ],
    ],

    'default_profile' => 'default',

    // The Panels to configure the Editorjs Image upload urls
    'panels' => ['admin'],

    'image_mime_types' => [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/tiff',
        'image/x-citrix-png',
        'image/x-png',
        'image/svg+xml',
        'image/svg',
    ],
];

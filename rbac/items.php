<?php
return [
    'View' => [
        'type' => 2,
        'description' => 'View',
    ],    
    'admin' => [
        'type' => 1,
        'children' => [
            'View',
            'HistoryLogin',
        ],
    ],
    'author' => [
        'type' => 1,
        'children' => [
            'ViewOwnNote',
            'HistoryLogin',
        ],
    ],
    'ViewOwnNote' => [
        'type' => 2,
        'description' => 'View own note',
        'ruleName' => 'isAdmin',
        'children' => [
            'View',
        ],
    ],
    'HistoryLogin' => [
        'type' => 2,
        'description' => 'HistoryLogin',
    ],    
];

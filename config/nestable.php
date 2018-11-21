<?php

return [
    'parent'=> 'parent_id',
    'primary_key' => 'id',
    'generate_url'   => true,
    'childNode' => 'child',
    'body' => [
        'id',
        'menu_name',
        'menu_slug',
        'menu_url'
    ],
    'html' => [
        'label' => 'menu_name',
        'href'  => 'menu_url'
    ],
    'dropdown' => [
        'prefix' => '',
        'label' => 'menu_name',
        'value' => 'id'
    ]
];

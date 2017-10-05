<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'deposits' => 'c,r,u,d',
            'extras' => 'c,r,u,d',
            'charges' => 'c,r,u,d',
            'invoice' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'profile' => 'r,u'

        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'deposits' => 'c,r,u,d',
            'extras' => 'c,r,u,d',
            'charges' => 'c,r,u,d',
            'invoice' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'manager' => [
            'deposits' => 'c,r',
            'extras' => 'c,r',
            'charges' => 'c,r',
            'invoice' => 'c,r',
            'profile' => 'r,u'
        ],
        
        'user' => [
            'deposits' => 'r',
            'extras' => 'r',
            'charges' => 'r',
            'invoice' => 'r',
            'profile' => 'r,u'
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];

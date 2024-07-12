<?php

// config for SujalRatnaTamrakar/KeycloakAdmin
return [
    'realm' => env('KEYCLOAK_REALM', 'master'),
    'base_url' => env('KEYCLOAK_BASE_URL', 'http://localhost:8080/auth/realms/'),
    'admin_url' => env('KEYCLOAK_ADMIN_BASE_URL', 'http://localhost:8080/admin/realms/'),
    'client' => [
        'id' => env('KEYCLOAK_ADMIN_CLIENT_ID'),
        'secret' => env('KEYCLOAK_ADMIN_CLIENT_SECRET'),
        'username' => env('KEYCLOAK_ADMIN_USERNAME'),
        'password' => env('KEYCLOAK_ADMIN_PASSWORD'),
    ],
    'api' => [
        'client' => [

            'auth' => env('KEYCLOAK_BASE_URL', 'localhost:8080').env('KEYCLOAK_REALM', 'master').'/protocol/openid-connect/token',

            'create' => [
                'api' => '/clients',
                'method' => 'post',
            ],
            'all' => [
                'api' => '/clients',
                'method' => 'get',
            ],
            'get' => [
                'api' => '/clients/{id}',
                'method' => 'get',
            ],
            'update' => [
                'api' => '/clients/{id}',
                'method' => 'put',
            ],
            'delete' => [
                'api' => '/clients/{id}',
                'method' => 'delete',
            ],

        ],
        'client_roles' => [

            'create' => [
                'api' => '/clients/{id}/roles',
                'method' => 'post',
            ],
            'all' => [
                'api' => '/clients/{id}/roles',
                'method' => 'get',
            ],
            'getByName' => [
                'api' => '/clients/{id}/roles/{role}',
                'method' => 'get',
            ],
            'composites' => [
                'api' => '/clients/{id}/roles/{role}/composites',
                'method' => 'post',
            ],
            'update' => [
                'update' => '/clients/{id}/roles/{role}',
                'method' => 'post',
            ],
            'delete' => [
                'update' => '/clients/{id}/roles/{role}',
                'method' => 'delete',
            ],

        ],
        'user' => [
            'count' => [
                'api' => '/users/count',
                'method' => 'get',
            ],
            'all' => [
                'api' => '/users',
                'method' => 'get',
            ],
            'create' => [
                'api' => '/users',
                'method' => 'post',
            ],
            'profile_configuration' => [
                'api' => '/users/profile',
                'method' => 'get',
            ],
            'profile_metadata' => [
                'api' => '/users/profile/metadata',
                'method' => 'get',
            ],
            'delete' => [
                'api' => fn ($user_id) => '/users/'.$user_id,
                'method' => 'delete',
            ],
            'logout' => [
                'api' => fn ($user_id) => '/users/'.$user_id.'/logout',
                'method' => 'post',
            ],
            'update' => [
                'api' => fn ($user_id) => '/users/'.$user_id,
                'method' => 'put',
            ],
            'reset-password' => [
                'api' => fn ($user_id) => '/users/'.$user_id.'/reset-password',
                'method' => 'put',
            ],
            'sessions' => [
                'api' => fn ($user_id) => '/users/'.$user_id.'/sessions',
                'method' => 'get',
            ],
            //************************************************************************************************
            'get' => [
                'api' => '/users/{id}',
                'method' => 'get',
            ],
            'groups' => [
                'api' => '/users/{id}/groups',
                'method' => 'get',
            ],
            'addToGroup' => [
                'api' => '/users/{id}/groups/{groupId}',
                'method' => 'put',
            ],
            'deleteFromGroup' => [
                'api' => '/users/{id}/groups/{groupId}',
                'method' => 'delete',
            ],
            'removeTOTP' => [
                'api' => '/users/{id}/remove-totp',
                'method' => 'put',
            ],
            'setTemporaryPassword' => [
                'api' => '/users/{id}/reset-password',
                'method' => 'put',
            ],
            'verifyByEmail' => [
                'api' => '/users/{id}/send-verify-email',
                'method' => 'put',
            ],
            'roleMappings' => [
                'api' => '/users/{id}/role-mappings',
                'method' => 'get',
            ],
            'addRealmRoles' => [
                'api' => '/users/{id}/role-mappings/realm',
                'method' => 'post',
            ],
            'getRealmRoles' => [
                'api' => '/users/{id}/role-mappings/realm',
                'method' => 'get',
            ],
            'deleteRealmRoles' => [
                'api' => '/users/{id}/role-mappings/realm',
                'method' => 'delete',
            ],
            'getAvailableRealmRoles' => [
                'api' => '/users/{id}/role-mappings/realm/available',
                'method' => 'get',
            ],
            'getEffectiveRealmRoles' => [
                'api' => '/users/{id}/role-mappings/realm/composite',
                'method' => 'get',
            ],
            'addClientRole' => [
                'api' => '/users/{id}/role-mappings/clients/{client_id}',
                'method' => 'post',
            ],
        ],
        'role' => [
            'create' => [
                'api' => '/roles',
                'method' => 'post',
            ],
            'all' => [
                'api' => '/roles',
                'method' => 'get',
            ],
            'get' => [
                'api' => '/roles-by-id/{id}',
                'method' => 'get',
            ],
            'getByName' => [
                'api' => '/roles/{role}',
                'method' => 'get',
            ],
            'update' => [
                'api' => '/roles-by-id/{id}',
                'method' => 'put',
            ],
            'updateByName' => [
                'api' => '/roles/{role}',
                'method' => 'put',
            ],
            'delete' => [
                'api' => '/roles-by-id/{id}',
                'method' => 'delete',
            ],
            'deleteByName' => [
                'api' => '/roles/{role}',
                'method' => 'delete',
            ],
        ],
    ],
];

<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Services;

use SujalRatnaTamrakar\KeycloakAdmin\Auth\ClientAuthService;

class Client
{
    public function __construct(ClientAuthService $clientAuthService)
    {
        $this->clientAuthService = $clientAuthService;
    }

}

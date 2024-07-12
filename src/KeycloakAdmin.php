<?php

namespace SujalRatnaTamrakar\KeycloakAdmin;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use SujalRatnaTamrakar\KeycloakAdmin\Auth\ClientAuthService;
use SujalRatnaTamrakar\KeycloakAdmin\Services\User;

class KeycloakAdmin
{
    public function __construct(ClientAuthService $clientAuthService)
    {
        $this->clientAuthService = $clientAuthService;
    }

    public function user(): User
    {
        return new User($this->clientAuthService);
    }

    /**
     * Returns the number of users that match the given criteria.
     *
     *
     * @return Response
     */
    public function getUserCount(): Response
    {
        return Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer KlsRsSb5Obwvaik6tGtMoga08exewRBS'
            ])->get('http://localhost:8087/admin/realms/master/users/count');
    }
}

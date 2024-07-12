<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Auth;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\HigherOrderTapProxy;

/**
 * Class ClientAuthService
 * @method static mixed getToken()
 * @method static array getAuthorizationToken()
 * @method static array getHeaders()
 * @method static array getParams()
 * @package SujalRatnaTamrakar\KeycloakAdmin\Auth
 */
class ClientAuthService
{
    public function authenticate()
    {
        $api = config('keycloak-admin.api.client.auth');
        Log::info(Cache::has('keycloak-admin-credentials') ? 'Using cached credentials' : 'Fetching new credentials');
        if (Cache::has('keycloak-admin-credentials')) {
            return response(Cache::get('keycloak-admin-credentials'), 200);
        }

        $response = Http::asForm()->withHeaders($this->getHeaders())->post($api, $this->getParams());
        return response($response->getBody(), $response->status())
            ->header('Content-Type', $response->header('Content-Type'));
    }

    /**
     * @return mixed
     */
    public function getToken(): mixed
    {
        $response = $this->authenticate();

        if ($response->status() !== 200) {
            return response($response->content(), $response->status())
                ->header('Content-Type', $response->headers->get('Content-Type'));
        }

        return $this->getAuthorizationToken($response)['access_token'];
    }

    /**
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response|HigherOrderTapProxy|mixed
     */
    public function getAuthorizationToken($response): mixed
    {
        $credentials = json_decode($response->content(), true);
        return tap($credentials, function ($credentials) {
            Cache::remember('keycloak-admin-credentials',$credentials['expires_in'], function () use ($credentials) {
                return $credentials;
            });
        });
    }

    public function getHeaders()
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
    }

    public function getParams()
    {
        return [
            'client_id' => config('keycloak-admin.client.id'),
            'client_secret' => config('keycloak-admin.client.secret'),
            'grant_type' => 'password',
            'username' => config('keycloak-admin.client.username'),
            'password' => config('keycloak-admin.client.password'),
        ];
    }

}

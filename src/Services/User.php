<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Services;

use Exception;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use SujalRatnaTamrakar\KeycloakAdmin\Actions\SendRequest;
use SujalRatnaTamrakar\KeycloakAdmin\Auth\ClientAuthService;
use SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth\CredentialRepresentation;
use SujalRatnaTamrakar\KeycloakAdmin\Representations\User\UserRepresentation;
use SujalRatnaTamrakar\KeycloakAdmin\Responses\ErrorResponse;
use SujalRatnaTamrakar\KeycloakAdmin\Responses\SuccessResponse;

/**
 * @method static Response getUserCount()
 * @method static Response getUsers()
 *
 * @see \SujalRatnaTamrakar\KeycloakAdmin\KeycloakAdmin
 */
class User
{
    /**
     * @var mixed|Repository|Application|\Illuminate\Foundation\Application
     */
    private mixed $base_url;

    /**
     * @var mixed|Repository|Application|\Illuminate\Foundation\Application
     */
    private mixed $realm;

    private mixed $token;

    private array $options;

    public ClientAuthService $clientAuthService;

    public function __construct(ClientAuthService $clientAuthService)
    {
        $this->clientAuthService = $clientAuthService;
        $this->base_url = config('keycloak-admin.admin_url');
        $this->realm = config('keycloak-admin.realm');
        $this->token = $this->clientAuthService->getToken();
        $this->options = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '.$this->token,
            ],
        ];
    }

    /**
     * Returns the number of users that match the given criteria.
     *
     * @param  array  $queryParams  Array containing the necessary query parameters/filters.
     *                              <table>
     *                              <thead>
     *                              <tr>
     *                              <th>Param</th>
     *                              <th>Description</th>
     *                              </tr>
     *                              </thead>
     *                              <tbody>
     *                              <tr>
     *                              <td>email</td>
     *                              <td>Email filter</td>
     *                              </tr>
     *                              <tr>
     *                              <td>emailVerified</td>
     *                              <td>Email verification filter</td>
     *                              </tr>
     *                              <tr>
     *                              <td>enabled</td>
     *                              <td>Boolean representing if user is enabled or not</td>
     *                              </tr>
     *                              <tr>
     *                              <td>firstName</td>
     *                              <td>First name filter</td>
     *                              </tr>
     *                              <tr>
     *                              <td>lastName</td>
     *                              <td>Last name filter</td>
     *                              </tr>
     *                              <tr>
     *                              <td>q</td>
     *                              <td>Search string</td>
     *                              </tr>
     *                              <tr>
     *                              <td>search</td>
     *                              <td>Arbitrary search string for all the fields below. Default search behavior is prefix-based (e.g., "foo" or "foo*"). Use "foo" for infix search and "\"foo\"" for exact search.</td>
     *                              </tr>
     *                              <tr>
     *                              <td>username</td>
     *                              <td>Username filter</td>
     *                              </tr>
     *                              </tbody>
     *                              </table>
     *
     * @throws Exception
     */
    public function getUserCount(array $queryParams = []): ErrorResponse|SuccessResponse
    {
        $route = config('keycloak-admin.api.user.count');
        $url = $this->base_url.$this->realm.$route['api'];

        return (new SendRequest())($route['method'], $url, $this->options, '', '', $queryParams);
    }

    /**
     * Get users Returns a stream of users, filtered according to query parameters.
     *
     * @param  array  $queryParams
     *                              <table>
     *                              <thead>
     *                              <tr>
     *                              <th>Name</th>
     *                              <th>Description</th>
     *                              </tr>
     *                              </thead>
     *                              <tbody>
     *                              <tr>
     *                              <td>briefRepresentation</td>
     *                              <td>Boolean which defines whether brief representations are returned (default: false)</td>
     *                              </tr>
     *                              <tr>
     *                              <td>email</td>
     *                              <td>A String contained in email, or the complete email, if param "exact" is true</td>
     *                              </tr>
     *                              <tr>
     *                              <td>emailVerified</td>
     *                              <td>whether the email has been verified</td>
     *                              </tr>
     *                              <tr>
     *                              <td>enabled</td>
     *                              <td>Boolean representing if user is enabled or not</td>
     *                              </tr>
     *                              <tr>
     *                              <td>exact</td>
     *                              <td>Boolean which defines whether the params "last", "first", "email", and "username" must match exactly</td>
     *                              </tr>
     *                              <tr>
     *                              <td>first</td>
     *                              <td>Pagination offset</td>
     *                              </tr>
     *                              <tr>
     *                              <td>firstName</td>
     *                              <td>A String contained in firstName, or the complete firstName, if param "exact" is true</td>
     *                              </tr>
     *                              <tr>
     *                              <td>idpAlias</td>
     *                              <td>The alias of an Identity Provider linked to the user</td>
     *                              </tr>
     *                              <tr>
     *                              <td>idpUserId</td>
     *                              <td>The userId at an Identity Provider linked to the user</td>
     *                              </tr>
     *                              <tr>
     *                              <td>lastName</td>
     *                              <td>A String contained in lastName, or the complete lastName, if param "exact" is true</td>
     *                              </tr>
     *                              <tr>
     *                              <td>max</td>
     *                              <td>Maximum results size (defaults to 100)</td>
     *                              </tr>
     *                              <tr>
     *                              <td>q</td>
     *                              <td>A query to search for custom attributes, in the format 'key1:value2 key2:value2'</td>
     *                              </tr>
     *                              <tr>
     *                              <td>search</td>
     *                              <td>A String contained in username, first or last name, or email. Default search behavior is prefix-based (e.g., foo or foo*). Use foo for infix search and "foo" for exact search.</td>
     *                              </tr>
     *                              <tr>
     *                              <td>username</td>
     *                              <td>A String contained in username, or the complete username, if param "exact" is true</td>
     *                              </tr>
     *                              </tbody>
     *                              </table>
     *
     * @throws Exception
     */
    public function getUsers(array $queryParams = []): ErrorResponse|SuccessResponse
    {
        $route = config('keycloak-admin.api.user.all');
        $url = $this->base_url.$this->realm.$route['api'];

        return (new SendRequest())($route['method'], $url, $this->options, '', '', $queryParams);
    }

    /**
     * Create a new user. Username must be unique.
     * Check your realm's login setting if email as username is toggled.
     *
     * @param  array  $data
     *                       <table>
     *                       <tr>
     *                       <td>id</td>
     *                       <td>string</td>
     *                       </tr>
     *                       <tr>
     *                       <td>username</td>
     *                       <td>string</td>
     *                       </tr>
     *                       <tr>
     *                       <td>firstName</td>
     *                       <td>string</td>
     *                       </tr>
     *                       <tr>
     *                       <td>lastName</td>
     *                       <td>string</td>
     *                       </tr>
     *                       <tr>
     *                       <td>email</td>
     *                       <td>string</td>
     *                       </tr>
     *                       <tr>
     *                       <td>emailVerified</td>
     *                       <td>boolean</td>
     *                       </tr>
     *                       <tr>
     *                       <td>attributes</td>
     *                       <td>array</td>
     *                       </tr>
     *                       <tr>
     *                       <td>userProfileMetadata</td>
     *                       <td>array</td>
     *                       </tr>
     *                       <tr>
     *                       <td>self</td>
     *                       <td>string</td>
     *                       </tr>
     *                       <tr>
     *                       <td>origin</td>
     *                       <td>string</td>
     *                       </tr>
     *                       <tr>
     *                       <td>createdTimestamp</td>
     *                       <td>integer</td>
     *                       </tr>
     *                       <tr>
     *                       <td>enabled</td>
     *                       <td>boolean</td>
     *                       </tr>
     *                       <tr>
     *                       <td>totp</td>
     *                       <td>boolean</td>
     *                       </tr>
     *                       <tr>
     *                       <td>federationLink</td>
     *                       <td>string</td>
     *                       </tr>
     *                       <tr>
     *                       <td>serviceAccountClientId</td>
     *                       <td>string</td>
     *                       </tr>
     *                       <tr>
     *                       <td>credential</td>
     *                       <td>Credential</td>
     *                       </tr>
     *                       <tr>
     *                       <td>disableableCredentialTypes</td>
     *                       <td>array</td>
     *                       </tr>
     *                       <tr>
     *                       <td>requiredActions</td>
     *                       <td>array</td>
     *                       </tr>
     *                       <tr>
     *                       <td>federatedIdentity</td>
     *                       <td>FederatedIdentity</td>
     *                       </tr>
     *                       <tr>
     *                       <td>realmRoles</td>
     *                       <td>array</td>
     *                       </tr>
     *                       <tr>
     *                       <td>clientRoles</td>
     *                       <td>array</td>
     *                       </tr>
     *                       <tr>
     *                       <td>clientConsents</td>
     *                       <td>UserConsent</td>
     *                       </tr>
     *                       <tr>
     *                       <td>notBefore</td>
     *                       <td>integer</td>
     *                       </tr>
     *                       <tr>
     *                       <td>applicationRoles</td>
     *                       <td>array</td>
     *                       </tr>
     *                       <tr>
     *                       <td>socialLink</td>
     *                       <td>SocialLink</td>
     *                       </tr>
     *                       <tr>
     *                       <td>groups</td>
     *                       <td>array</td>
     *                       </tr>
     *                       <tr>
     *                       <td>access</td>
     *                       <td>array</td>
     *                       </tr>
     *                       </table>
     *
     * @throws Exception
     */
    public function create(array $data): ErrorResponse|SuccessResponse
    {
        $userRepresentation = new UserRepresentation($data);
        $route = config('keycloak-admin.api.user.create');
        $url = $this->base_url.$this->realm.$route['api'];

        return (new SendRequest())($route['method'], $url, $this->options, $userRepresentation->toJson());
    }

    /**
     * Get the configuration for the user profile
     *
     * @throws Exception
     */
    public function profileConfiguration(): ErrorResponse|SuccessResponse
    {
        $route = config('keycloak-admin.api.user.profile_configuration');
        $url = $this->base_url.$this->realm.$route['api'];

        return (new SendRequest())($route['method'], $url, $this->options);
    }

    /**
     * Get the UserProfileMetadata from the configuration
     *
     * @throws Exception
     */
    public function profileMetadata(): ErrorResponse|SuccessResponse
    {
        $route = config('keycloak-admin.api.user.profile_metadata');
        $url = $this->base_url.$this->realm.$route['api'];

        return (new SendRequest())($route['method'], $url, $this->options);
    }

    /**
     * Delete the user
     *
     * @throws Exception
     */
    public function delete($user_id): ErrorResponse|SuccessResponse
    {
        $route = config('keycloak-admin.api.user.delete');
        $url = $this->base_url.$this->realm.$route['api']($user_id);

        return (new SendRequest())($route['method'], $url, $this->options);
    }

    /**
     * Remove all user sessions associated with the user.
     * Also send notification to all clients that have an admin URL to invalidate the sessions for the particular user.
     */
    public function logout($user_id): ErrorResponse|SuccessResponse
    {
        $route = config('keycloak-admin.api.user.logout');
        $url = $this->base_url.$this->realm.$route['api']($user_id);

        return (new SendRequest())($route['method'], $url, $this->options);
    }

    /**
     * Update the user
     */
    public function update($user_id, array $data): ErrorResponse|SuccessResponse
    {
        $userRepresentation = new UserRepresentation($data);
        $route = config('keycloak-admin.api.user.update');
        $url = $this->base_url.$this->realm.$route['api']($user_id);

        return (new SendRequest())($route['method'], $url, $this->options, $userRepresentation->toJson());
    }

    /**
     * Set up a new password for the user.
     *
     * @throws Exception
     */
    public function resetPassword($user_id, array $data): mixed
    {
        $credentialRepresentation = new CredentialRepresentation($data);
        $route = config('keycloak-admin.api.user.reset-password');

        return Http::asForm()
            ->withBody($credentialRepresentation->toJson())
            ->send($route['method'], $this->base_url.$this->realm.$route['api']($user_id), $this->options)
            ->json();
    }

    /**
     * @throws Exception
     */
    public function sessions($user_id): mixed
    {
        $route = config('keycloak-admin.api.user.sessions');

        return Http::asForm()
            ->send($route['method'], $this->base_url.$this->realm.$route['api']($user_id), $this->options)
            ->json();
    }
}

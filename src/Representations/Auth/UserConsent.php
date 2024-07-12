<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth;

class UserConsent
{
    public ?string $clientId;

    public ?array $grantedClientScopes;

    public ?int $createdDate;

    public ?int $lastUpdatedDate;

    public ?array $grantedRealmRoles;

    /**
     * UserConsentRepresentation constructor.
     *
     * @param  array  $data
     *                       <table>
     *                       <tbody>
     *                       <tr>
     *                       <td>clientId</td>
     *                       </tr>
     *                       <tr>
     *                       <td>grantedClientScopes</td>
     *                       </tr>
     *                       <tr>
     *                       <td>createdDate</td>
     *                       </tr>
     *                       <tr>
     *                       <td>lastUpdatedDate</td>
     *                       </tr>
     *                       <tr>
     *                       <td>grantedRealmRoles</td>
     *                       </tr>
     *                       </tbody>
     *                       </table>
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}

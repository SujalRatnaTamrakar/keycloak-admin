<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth;

class UserConsent
{
    /** @var string|null */
    public ?string $clientId;
    /** @var array|null */
    public ?array $grantedClientScopes;
    /** @var int|null */
    public ?int $createdDate;
    /** @var int|null */
    public ?int $lastUpdatedDate;
    /** @var array|null */
    public ?array $grantedRealmRoles;

    /**
     * UserConsentRepresentation constructor.
     * @param array $data
     * <table>
     * <tbody>
     * <tr>
     * <td>clientId</td>
     * </tr>
     * <tr>
     * <td>grantedClientScopes</td>
     * </tr>
     * <tr>
     * <td>createdDate</td>
     * </tr>
     * <tr>
     * <td>lastUpdatedDate</td>
     * </tr>
     * <tr>
     * <td>grantedRealmRoles</td>
     * </tr>
     * </tbody>
     * </table>
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

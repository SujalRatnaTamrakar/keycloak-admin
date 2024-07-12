<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Representations\User;

use SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth\CredentialRepresentation;
use SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth\FederatedIdentity;
use SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth\SocialLink;
use SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth\UserConsent;

class UserRepresentation
{
    /** @var string|null */
    public ?string $id;
    /** @var string|null */
    public ?string $username;
    /** @var string|null */
    public ?string $firstName;
    /** @var string|null */
    public ?string $lastName;
    /** @var string|null */
    public ?string $email;
    /** @var bool|null */
    public ?bool $emailVerified;
    /** @var array|null */
    public ?array $attributes;
    /** @var array|null */
    public ?array $userProfileMetadata;
    /** @var string|null */
    public ?string $self;
    /** @var string|null */
    public ?string $origin;
    /** @var int|null */
    public ?int $createdTimestamp;
    /** @var bool|null */
    public ?bool $enabled;
    /** @var bool|null */
    public ?bool $totp;
    /** @var string|null */
    public ?string $federationLink;
    /** @var string|null */
    public ?string $serviceAccountClientId;
    /** @var CredentialRepresentation|null */
    public ?CredentialRepresentation $credential;
    /** @var array|null */
    public ?array $disableableCredentialTypes;
    /** @var array|null */
    public ?array $requiredActions;
    /** @var FederatedIdentity|null */
    public ?FederatedIdentity $federatedIdentity;
    /** @var array|null */
    public ?array $realmRoles;
    /** @var array|null */
    public ?array $clientRoles;
    /** @var UserConsent|null */
    public ?UserConsent $clientConsents;
    /** @var int|null */
    public ?int $notBefore;
    /** @var array|null */
    public ?array $applicationRoles;
    /** @var SocialLink|null */
    public ?SocialLink $socialLink;
    /** @var array|null */
    public ?array $groups;
    /** @var array|null */
    public ?array $access;

    /**
     * UserRepresentation constructor.
     * @param array $data
     * <table>
     * <tbody>
     * <tr>
     * <td>id</td>
     * </tr>
     * <tr>
     * <td>username</td>
     * </tr>
     * <tr>
     * <td>firstName</td>
     * </tr>
     * <tr>
     * <td>lastName</td>
     * </tr>
     * <tr>
     * <td>email</td>
     * </tr>
     * <tr>
     * <td>emailVerified</td>
     * </tr>
     * <tr>
     * <td>attributes</td>
     * </tr>
     * <tr>
     * <td>userProfileMetadata</td>
     * </tr>
     * <tr>
     * <td>self</td>
     * </tr>
     * <tr>
     * <td>origin</td>
     * </tr>
     * <tr>
     * <td>createdTimestamp</td>
     * </tr>
     * <tr>
     * <td>enabled</td>
     * </tr>
     * <tr>
     * <td>totp</td>
     * </tr>
     * <tr>
     * <td>federationLink</td>
     * </tr>
     * <tr>
     * <td>serviceAccountClientId</td>
     * </tr>
     * <tr>
     * <td>credentials</td>
     * </tr>
     * <tr>
     * <td>disableableCredentialTypes</td>
     * </tr>
     * <tr>
     * <td>requiredActions</td>
     * </tr>
     * <tr>
     * <td>federatedIdentities</td>
     * </tr>
     * <tr>
     * <td>realmRoles</td>
     * </tr>
     * <tr>
     * <td>clientRoles</td>
     * </tr>
     * <tr>
     * <td>clientConsents</td>
     * </tr>
     * <tr>
     * <td>notBefore</td>
     * </tr>
     * <tr>
     * <td>applicationRoles</td>
     * </tr>
     * <tr>
     * <td>socialLinks</td>
     * </tr>
     * <tr>
     * <td>groups</td>
     * </tr>
     * <tr>
     * <td>access</td>
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

    public function toJson(): bool|string
    {
        return json_encode($this);
    }

    public function toArray(): array
    {
        return json_decode(json_encode($this), true);
    }
}

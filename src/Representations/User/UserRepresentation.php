<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Representations\User;

use SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth\CredentialRepresentation;
use SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth\FederatedIdentity;
use SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth\SocialLink;
use SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth\UserConsent;

class UserRepresentation
{
    public ?string $id;

    public ?string $username;

    public ?string $firstName;

    public ?string $lastName;

    public ?string $email;

    public ?bool $emailVerified;

    public ?array $attributes;

    public ?array $userProfileMetadata;

    public ?string $self;

    public ?string $origin;

    public ?int $createdTimestamp;

    public ?bool $enabled;

    public ?bool $totp;

    public ?string $federationLink;

    public ?string $serviceAccountClientId;

    public ?CredentialRepresentation $credential;

    public ?array $disableableCredentialTypes;

    public ?array $requiredActions;

    public ?FederatedIdentity $federatedIdentity;

    public ?array $realmRoles;

    public ?array $clientRoles;

    public ?UserConsent $clientConsents;

    public ?int $notBefore;

    public ?array $applicationRoles;

    public ?SocialLink $socialLink;

    public ?array $groups;

    public ?array $access;

    /**
     * UserRepresentation constructor.
     *
     * @param  array  $data
     *                       <table>
     *                       <tbody>
     *                       <tr>
     *                       <td>id</td>
     *                       </tr>
     *                       <tr>
     *                       <td>username</td>
     *                       </tr>
     *                       <tr>
     *                       <td>firstName</td>
     *                       </tr>
     *                       <tr>
     *                       <td>lastName</td>
     *                       </tr>
     *                       <tr>
     *                       <td>email</td>
     *                       </tr>
     *                       <tr>
     *                       <td>emailVerified</td>
     *                       </tr>
     *                       <tr>
     *                       <td>attributes</td>
     *                       </tr>
     *                       <tr>
     *                       <td>userProfileMetadata</td>
     *                       </tr>
     *                       <tr>
     *                       <td>self</td>
     *                       </tr>
     *                       <tr>
     *                       <td>origin</td>
     *                       </tr>
     *                       <tr>
     *                       <td>createdTimestamp</td>
     *                       </tr>
     *                       <tr>
     *                       <td>enabled</td>
     *                       </tr>
     *                       <tr>
     *                       <td>totp</td>
     *                       </tr>
     *                       <tr>
     *                       <td>federationLink</td>
     *                       </tr>
     *                       <tr>
     *                       <td>serviceAccountClientId</td>
     *                       </tr>
     *                       <tr>
     *                       <td>credentials</td>
     *                       </tr>
     *                       <tr>
     *                       <td>disableableCredentialTypes</td>
     *                       </tr>
     *                       <tr>
     *                       <td>requiredActions</td>
     *                       </tr>
     *                       <tr>
     *                       <td>federatedIdentities</td>
     *                       </tr>
     *                       <tr>
     *                       <td>realmRoles</td>
     *                       </tr>
     *                       <tr>
     *                       <td>clientRoles</td>
     *                       </tr>
     *                       <tr>
     *                       <td>clientConsents</td>
     *                       </tr>
     *                       <tr>
     *                       <td>notBefore</td>
     *                       </tr>
     *                       <tr>
     *                       <td>applicationRoles</td>
     *                       </tr>
     *                       <tr>
     *                       <td>socialLinks</td>
     *                       </tr>
     *                       <tr>
     *                       <td>groups</td>
     *                       </tr>
     *                       <tr>
     *                       <td>access</td>
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

    public function toJson(): bool|string
    {
        return json_encode($this);
    }

    public function toArray(): array
    {
        return json_decode(json_encode($this), true);
    }
}

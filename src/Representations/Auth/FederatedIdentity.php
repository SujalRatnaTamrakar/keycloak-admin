<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth;

class FederatedIdentity
{
    public ?string $identityProvider;

    public ?string $userId;

    public ?string $userName;

    /**
     * FederatedIdentity constructor.
     *
     * @param  array  $data
     *                       <table>
     *                       <tbody>
     *                       <tr>
     *                       <td>identityProvider</td>
     *                       </tr>
     *                       <tr>
     *                       <td>userId</td>
     *                       </tr>
     *                       <tr>
     *                       <td>userName</td>
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

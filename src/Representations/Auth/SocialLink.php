<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth;

class SocialLink
{
    public ?string $socialProvider;

    public ?string $socialUserId;

    public ?string $socialUsername;

    /**
     * SocialLinkRepresentation constructor.
     *
     * @param  array  $data
     *                       <table>
     *                       <tbody>
     *                       <tr>
     *                       <td>socialProvider</td>
     *                       </tr>
     *                       <tr>
     *                       <td>socialUserId</td>
     *                       </tr>
     *                       <tr>
     *                       <td>socialUsername</td>
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

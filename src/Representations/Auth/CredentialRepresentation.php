<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth;

class CredentialRepresentation
{
    public ?string $id;

    public ?string $type;

    public ?string $userLabel;

    public ?int $createdDate;

    public ?string $secretData;

    public ?string $credentialData;

    public ?int $priority;

    public ?string $value;

    public ?bool $temporary;

    public ?string $device;

    public ?string $hashedSaltedValue;

    public ?string $salt;

    public ?int $hashIterations;

    public ?int $counter;

    public ?string $algorithm;

    public ?int $digits;

    public ?int $period;

    public ?array $config;

    /**
     * CredentialRepresentation constructor.
     *
     * @param  array  $data
     *                       <table border="1">
     *                       <tbody>
     *                       <tr>
     *                       <td>id</td>
     *                       </tr>
     *                       <tr>
     *                       <td>type</td>
     *                       </tr>
     *                       <tr>
     *                       <td>userLabel</td>
     *                       </tr>
     *                       <tr>
     *                       <td>createdDate</td>
     *                       </tr>
     *                       <tr>
     *                       <td>secretData</td>
     *                       </tr>
     *                       <tr>
     *                       <td>credentialData</td>
     *                       </tr>
     *                       <tr>
     *                       <td>priority</td>
     *                       </tr>
     *                       <tr>
     *                       <td>value</td>
     *                       </tr>
     *                       <tr>
     *                       <td>temporary</td>
     *                       </tr>
     *                       <tr>
     *                       <td>device</td>
     *                       </tr>
     *                       <tr>
     *                       <td>hashedSaltedValue</td>
     *                       </tr>
     *                       <tr>
     *                       <td>salt</td>
     *                       </tr>
     *                       <tr>
     *                       <td>hashIterations</td>
     *                       </tr>
     *                       <tr>
     *                       <td>counter</td>
     *                       </tr>
     *                       <tr>
     *                       <td>algorithm</td>
     *                       </tr>
     *                       <tr>
     *                       <td>digits</td>
     *                       </tr>
     *                       <tr>
     *                       <td>period</td>
     *                       </tr>
     *                       <tr>
     *                       <td>config</td>
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

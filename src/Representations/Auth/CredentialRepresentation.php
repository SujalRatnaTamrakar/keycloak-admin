<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Representations\Auth;

class CredentialRepresentation {
    /** @var string|null */
    public ?string $id;
    /** @var string|null */
    public ?string $type;
    /** @var string|null */
    public ?string $userLabel;
    /** @var int|null */
    public ?int $createdDate;
    /** @var string|null */
    public ?string $secretData;
    /** @var string|null */
    public ?string $credentialData;
    /** @var int|null */
    public ?int $priority;
    /** @var string|null */
    public ?string $value;
    /** @var bool|null */
    public ?bool $temporary;
    /** @var string|null */
    public ?string $device;
    /** @var string|null */
    public ?string $hashedSaltedValue;
    /** @var string|null */
    public ?string $salt;
    /** @var int|null */
    public ?int $hashIterations;
    /** @var int|null */
    public ?int $counter;
    /** @var string|null */
    public ?string $algorithm;
    /** @var int|null */
    public ?int $digits;
    /** @var int|null */
    public ?int $period;
    /** @var array|null */
    public ?array $config;

    /**
     * CredentialRepresentation constructor.
     * @param array $data
     * <table border="1">
     * <tbody>
     * <tr>
     * <td>id</td>
     * </tr>
     * <tr>
     * <td>type</td>
     * </tr>
     * <tr>
     * <td>userLabel</td>
     * </tr>
     * <tr>
     * <td>createdDate</td>
     * </tr>
     * <tr>
     * <td>secretData</td>
     * </tr>
     * <tr>
     * <td>credentialData</td>
     * </tr>
     * <tr>
     * <td>priority</td>
     * </tr>
     * <tr>
     * <td>value</td>
     * </tr>
     * <tr>
     * <td>temporary</td>
     * </tr>
     * <tr>
     * <td>device</td>
     * </tr>
     * <tr>
     * <td>hashedSaltedValue</td>
     * </tr>
     * <tr>
     * <td>salt</td>
     * </tr>
     * <tr>
     * <td>hashIterations</td>
     * </tr>
     * <tr>
     * <td>counter</td>
     * </tr>
     * <tr>
     * <td>algorithm</td>
     * </tr>
     * <tr>
     * <td>digits</td>
     * </tr>
     * <tr>
     * <td>period</td>
     * </tr>
     * <tr>
     * <td>config</td>
     * </tr>
     * </tbody>
     * </table>
     */
    public function __construct(array $data = []) {
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

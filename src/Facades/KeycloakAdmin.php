<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Facades;

use Illuminate\Support\Facades\Facade;
use SujalRatnaTamrakar\KeycloakAdmin\Services\User;

/**
 * @method static User user()
 *
 * @see \SujalRatnaTamrakar\KeycloakAdmin\KeycloakAdmin
 */
class KeycloakAdmin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \SujalRatnaTamrakar\KeycloakAdmin\KeycloakAdmin::class;
    }
}

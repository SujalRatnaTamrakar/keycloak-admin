<?php

namespace SujalRatnaTamrakar\KeycloakAdmin\Commands;

use Illuminate\Console\Command;

class KeycloakAdminCommand extends Command
{
    public $signature = 'keycloak-admin';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

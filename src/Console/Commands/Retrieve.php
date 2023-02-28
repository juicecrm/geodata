<?php

namespace JuiceCRM\GeoData\Console\Commands;

use Illuminate\Console\Command;
use JuiceCRM\GeoData\Actions\Retrieve as RetrieveAction;

class Retrieve extends Command
{
    /**
     * {@inheritDoc}
     */
    protected $signature = 'geodata:retrieve';

    /**
     * {@inheritDoc}
     */
    protected $description = 'Retrieve the Geographical data.';

    /**
     * {@inheritDoc}
     */
    public function handle()
    {
        $this->components->info('Retrieving Geographical Data.');

        try {
            (new RetrieveAction)();
        } catch(Throwable $t) {
            $this->components->error('Failed to retrieve i18n data.');

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}

<?php

namespace JuiceCRM\GeoData\Console\Commands;

use Illuminate\Console\Command;
use JuiceCRM\GeoData\Actions\Store as StoreAction;

class Store extends Command
{
    /**
     * {@inheritDoc}
     */
    protected $signature = 'geodata:store';

    /**
     * {@inheritDoc}
     */
    protected $description = 'Store the geographical data.';

    /**
     * {@inheritDoc}
     */
    public function handle()
    {
        $this->components->info('Storing Geographical Data.');

        try {
            (new StoreAction)();
        } catch (Throwable $t) {
            $this->components->error('Failed to store geographical data.');

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}

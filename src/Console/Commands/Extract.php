<?php

namespace JuiceCRM\GeoData\Console\Commands;

use Illuminate\Console\Command;
use JuiceCRM\GeoData\Actions\Extract as ExtractAction;

class Extract extends Command
{
    /**
     * {@inheritDoc}
     */
    protected $signature = 'geodata:extract';

    /**
     * {@inheritDoc}
     */
    protected $description = 'Extract the geographical data.';

    /**
     * {@inheritDoc}
     */
    public function handle()
    {
        $this->components->info('Extracting Geographical Data.');

        try {
            (new ExtractAction)();
        } catch(Throwable $t) {
            $this->components->error('Failed to extract geographical data.');

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}

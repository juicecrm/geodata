<?php

namespace JuiceCRM\GeoData\Console\Commands;

use Illuminate\Console\Command;

class Refresh extends Command
{
    /**
     * {@inheritDoc}
     */
    protected $signature = 'geodata:refresh';

    /**
     * {@inheritDoc}
     */
    protected $description = 'Refresh the Geographical data.';

    /**
     * {@inheritDoc}
     */
    public function handle()
    {
        $this->components->info('Refreshing Geographical Data.');

        $this->retrieveGeoData();

        $this->extractGeoData();

        $this->storeGeoData();

        return Command::SUCCESS;
    }

    /**
     * Compile the retrieved data and store GeoData.
     *
     * @return void
     */
    protected function extractGeoData()
    {
        $this->components->task('Extracting Geographical Data', function () {
            return $this->callSilent('geodata:extract') == Command::SUCCESS;
        });
    }

    /**
     * Retrieve the data from the data providers.
     *
     * @return void
     */
    protected function retrieveGeoData()
    {
        $this->components->task('Retrieving Geographical Data', function () {
            return $this->callSilent('geodata:retrieve') == Command::SUCCESS;
        });
    }

    /**
     * Store the retrieved data and store GeoData in the database.
     *
     * @return void
     */
    protected function storeGeoData()
    {
        $this->components->task('Storing Geographical Data', function () {
            return $this->callSilent('geodata:store') == Command::SUCCESS;
        });
    }
}

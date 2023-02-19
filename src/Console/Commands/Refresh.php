<?php

namespace JuiceCRM\GeoData\Console\Commands;

use Illuminate\Console\Command;

class Refresh extends Command
{
	/**
	 * @inheritDoc
	 */
	protected $signature = 'geodata:refresh';
	
	/**
	 * @inheritDoc
	 */
	protected $description = 'Refresh the Geographical data.';

	/**
	 * @inheritDoc
	 */
	public function handle()
	{
		$this->components->info('Refreshing Geographical Data.');

		$this->retrieveData();

		$this->compileGeoData();

		$this->storeGeoData();

		return Command::SUCCESS;
	}

	/**
	 * Compile the retrieved data and store GeoData.
	 *
	 * @return void
	 */
	protected function compileGeoData()
	{
		$this->components->task('Compiling i18n data', function () {
			return $this->callSilent('geodata:compile') == Command::SUCCESS;
		});
	}

	/**
	 * Retrieve the data from the data providers.
	 *
	 * @return void
	 */
	protected function retrieveData()
	{
		$this->components->task('Retrieving data', function () {
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
		$this->components->task('Storing i18n data', function () {
			return $this->callSilent('geodata:store') == Command::SUCCESS;
		});
	}
}
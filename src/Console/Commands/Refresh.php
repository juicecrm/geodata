<?php

namespace JuiceCRM\I18nData\Console\Commands;

use Illuminate\Console\Command;

class Refresh extends Command
{
	/**
	 * @inheritDoc
	 */
	protected $signature = 'i18n-data:refresh';
	
	/**
	 * @inheritDoc
	 */
	protected $description = 'Refresh the internationalization data.';

	/**
	 * @inheritDoc
	 */
	public function handle()
	{
		$this->components->info('Refreshing Internationalization Data.');

		$this->retrieveData();

		$this->compileI18nData();

		$this->storeI18nData();

		return Command::SUCCESS;
	}

	/**
	 * Compile the retrieved data and store I18nData.
	 *
	 * @return void
	 */
	protected function compileI18nData()
	{
		$this->components->task('Compiling i18n data', function () {
			return $this->callSilent('i18n-data:compile') == Command::SUCCESS;
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
			return $this->callSilent('i18n-data:retrieve') == Command::SUCCESS;
		});
	}

	/**
	 * Store the retrieved data and store I18nData in the database.
	 *
	 * @return void
	 */
	protected function storeI18nData()
	{
		$this->components->task('Storing i18n data', function () {
			return $this->callSilent('i18n-data:store') == Command::SUCCESS;
		});
	}
}
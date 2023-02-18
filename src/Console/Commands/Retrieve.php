<?php

use Illuminate\Console\Command;
use JuiceCRM\I18nData\Actions\Retrieve as RetrieveAction;

class Retrieve extends Command
{
	/**
	 * @inheritDoc
	 */
	protected $signature = 'i18n-data:retrieve';
	
	/**
	 * @inheritDoc
	 */
	protected $description = 'Retrieve the internationalization data.';

	/**
	 * @inheritDoc
	 */
	public function handle()
	{
		$this->components->info('Retrieving Internationalization Data.');

		try {
			(new RetrieveAction)();
		} catch(Throwable $t) {
			$this->components->error('Failed to retrieve i18n data.');

			return Command::FAILURE;
		}

		return Command::SUCCESS;
	}
}
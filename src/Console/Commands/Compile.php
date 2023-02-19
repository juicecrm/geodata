<?php

use Illuminate\Console\Command;
use JuiceCRM\GeoData\Actions\Compile as CompileAction;

class Compile extends Command
{
	/**
	 * @inheritDoc
	 */
	protected $signature = 'geodata:compile';
	
	/**
	 * @inheritDoc
	 */
	protected $description = 'Compile the geographical data.';

	/**
	 * @inheritDoc
	 */
	public function handle()
	{
		$this->components->info('Compiling Geographical Data.');

		try {
			(new CompileAction)();
		} catch(Throwable $t) {
			$this->components->error('Failed to compile geographical data.');

			return Command::FAILURE;
		}

		return Command::SUCCESS;
	}
}
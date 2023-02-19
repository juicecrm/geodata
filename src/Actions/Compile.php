<?php

namespace JuiceCRM\GeoData\Actions;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use JuiceCRM\GeoData\Exceptions\GeoDataException;

class Compile
{
	/**
	 * Compile several lists and store them in storage/app/geodata/compiled and unlink the storage/app/geodata/downloads directory.
	 *
	 * @return void
	 */
	public function __invoke()
	{
		if(!file_exists(storage_path('app/geodata/downloads/countries-master.zip'))) {
			throw new GeoDataException('Data is not downloaded yet.');
		}

		/* unzip */

		/* Read countries-master/countries.json */

		/* Create following lists
		 * 1) Regions
		 * 2) Countries
		 * 3) Demonyms
		 * 4) Languages
		 * 5) Currencies
		 * 6) International dialing codes
		 */
	}
}
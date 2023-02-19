<?php

namespace JuiceCRM\GeoData\Actions;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use JuiceCRM\GeoData\Exceptions\GeoDataException;

class Retrieve
{
	/**
	 * Retrieve the all the relevant data.
	 *
	 * @return void
	 */
	public function __invoke()
	{
		if(!is_dir(storage_path('/app/geodata/downloads'))) {
			mkdir(storage_path('/app/geodata/downloads'));
			mkdir(storage_path('/app/geodata/compiled'));
		}

		try {
			$response = Http::connectTimeout(3)
				->timeout(120)
				->throw()
				->get('https://github.com/mledoze/countries/archive/master.zip');
			file_put_contents(storage_path('app/geodata/downloads/countries-master.zip'), $response->getBody());
		} catch(ConnectionException $ce) {
			throw new GeoDataException('Failed to retrieve the data.');
		}
	}
}
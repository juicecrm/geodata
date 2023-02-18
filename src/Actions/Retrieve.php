<?php

namespace JuiceCRM\I18nData\Actions;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use JuiceCRM\I18nData\Exceptions\I18nDataException;

class Retrieve
{
	/**
	 * Retrieve the all the relevant data.
	 *
	 * @return void
	 */
	public function __invoke()
	{
		try {
			$response = Http::connectTimeout(3)
				->timeout(120)
				->throw()
				->get('https://github.com/mledoze/countries/archive/master.zip');
			file_put_contents(storage_path('app/i18n-data/countries-master.zip'), $response->getBody());
		} catch(ConnectionException $ce) {
			throw new I18nDataException('Failed to retrieve the data.');
		}
	}
}
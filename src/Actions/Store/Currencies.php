<?php

namespace JuiceCRM\GeoData\Actions\Store;

use JuiceCRM\GeoData\Models\Currency;

class Currencies extends Base
{
	/**
	 * Store Country models from the JSON file.
	 *
	 * @return void
	 */
	public function __invoke()
	{
		$this->loadJsonCurrencies();

		foreach ($this->jsonCurrencies as $key => $jsonCurrency) {
			Currency::firstOrCreate([
				'iso3' => $jsonCurrency['iso']['code'],
				'name' => $jsonCurrency['name'],
				'numeric' => $jsonCurrency['iso']['number'],
			], [
				'major_name' => $jsonCurrency['units']['major']['name'],
				'major_symbol' => $jsonCurrency['units']['major']['symbol'],
				'minor_name' => $jsonCurrency['units']['minor']['name'],
				'minor_symbol' => $jsonCurrency['units']['minor']['symbol'],
				'minor_value' => (double) $jsonCurrency['units']['minor']['majorValue'],
			]);
		}
	}
}
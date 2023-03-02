<?php

namespace JuiceCRM\GeoData\Actions\Store;

class Currencies extends Base
{
	/**
	 * Store Country models from the JSON file.
	 *
	 * @return void
	 */
	public function __invoke()
	{
		$this->loadJsonCountries();

		foreach ($this->jsonCountries as $jsonCountry) {
		}
	}
}
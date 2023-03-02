<?php

namespace JuiceCRM\GeoData\Actions\Store;

use JuiceCRM\GeoData\Models\Country;

class Countries extends Base
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
			$region = $this->region(strlen($jsonCountry['subregion']) ? $jsonCountry['subregion'] : $jsonCountry['region']);

			$country = Country::firstOrCreate([
                'iso2' => $jsonCountry['cca2'],
                'iso3' => $jsonCountry['cca3'],
                'numeric' => $jsonCountry['ccn3'],
            ], [
                'region_id' => $region->id,
                'capital' => $jsonCountry['capital'][0],
                'common' => $jsonCountry['name']['common'],
                'independent' => $jsonCountry['independent'] ?? false,
                'landlocked' => $jsonCountry['landlocked'],
                'latitude' => $jsonCountry['latlng'][0],
                'longitude' => $jsonCountry['latlng'][1],
                'official' => $jsonCountry['name']['official'],
                'status' => $jsonCountry['status'],
            ]);

			/*
			 * TODO Link $country with Borders, Currencies, Demonymes and Languages.
			 */
		}
	}
}
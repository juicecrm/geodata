<?php

namespace JuiceCRM\GeoData\Actions\Store;

use JuiceCRM\GeoData\Exceptions\GeoDataException;
use JuiceCRM\GeoData\Models\Region;

class Base
{
	protected $jsonCountries = [];
	protected $jsonCurrencies = [];
	protected $jsonLanguages = [];

	/**
	 * The JSON representation for the country identified by $iso3.
	 *
	 * @param string $iso3
	 * @return array
	 */
	protected function jsonCountry(string $iso3): array
	{
		$iso3Lowercase = strtolower($iso3);
		foreach($this->jsonCountries as $jsonCountry) {
			if(strtolower($jsonCountry['cca3']) === $iso3Lowercase) {
				return $jsonCountry;
			}
		}

		return [];
	}

    /**
     * Load the countries from the JSON file.
     *
     * @return void
     */
    protected function loadJsonCountries()
    {
        if (! file_exists(storage_path('app/geodata/extracts/countries-master/countries.json'))) {
            throw new GeoDataException('Data is not extracted yet.');
        }

		$this->jsonCountries = json_decode(
            file_get_contents(storage_path('app/geodata/extracts/countries-master/countries.json')),
            true
        );
    }
	
    /**
     * Load the currencies from the JSON file.
     *
     * @return void
     */
    protected function loadJsonCurrencies()
    {
        if (! file_exists(storage_path('app/geodata/extracts/world-currencies-master/dist/json/currencies.json'))) {
            throw new GeoDataException('Data is not extracted yet.');
        }

		$this->jsonCurrencies = json_decode(
            file_get_contents(storage_path('app/geodata/extracts/world-currencies-master/dist/json/currencies.json')),
            true
        );
    }
	
    /**
     * Load the languages from the JSON file.
     *
     * @return void
     */
    protected function loadJsonLanguages()
    {
        if (! file_exists(storage_path('app/geodata/extracts/language-codes.json'))) {
            throw new GeoDataException('Data is not extracted yet.');
        }

		$this->jsonLanguages = json_decode(
            file_get_contents(storage_path('app/geodata/extracts/language-codes.json')),
            true
        );
    }

	/**
	 * The Region model with the given name.
	 *
	 * @param string $name
	 * @return Region|null
	 */
	protected function region(string $name): ?Region
	{
		return $region = Region::whereName($name)
			->first();
	}
}
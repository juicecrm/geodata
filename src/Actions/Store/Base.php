<?php

namespace JuiceCRM\GeoData\Actions\Store;

use JuiceCRM\GeoData\Exceptions\GeoDataException;
use JuiceCRM\GeoData\Models\Country;
use JuiceCRM\GeoData\Models\Region;

class Base
{
    protected $jsonCountries = [];

    protected $jsonCurrencies = [];

    protected $jsonLanguages = [];

    /**
     * Load the countries from the JSON file.
     *
     * @return void
     */
    protected function loadJsonCountries()
    {
        if (! file_exists(storage_path('app/geodata/extracts/mledoze-countries-master/countries-master/countries.json'))) {
            throw new GeoDataException('Country data is not extracted yet.');
        }

        $this->jsonCountries = json_decode(
            file_get_contents(storage_path('app/geodata/extracts/mledoze-countries-master/countries-master/countries.json')),
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
            throw new GeoDataException('Currency data is not extracted yet.');
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
            throw new GeoDataException('Language data is not extracted yet.');
        }

        $this->jsonLanguages = json_decode(
            file_get_contents(storage_path('app/geodata/extracts/language-codes.json')),
            true
        );
    }

	/**
	 * Load the divisions file for the country identified by $iso2.
	 *
	 * @param string $iso2
	 * @return array
	 * @throws GeoDataException
	 */
	protected function loadJsonSubdivisions(Country $country): array
	{
		if(! file_exists(storage_path('app/geodata/extracts/rinvex-countries-master/countries-master/resources/divisions/'.$country->iso2.'.json'))) {
			return [];
		}

		return json_decode(
			file_get_contents(
				storage_path('app/geodata/extracts/rinvex-countries-master/countries-master/resources/divisions/'.$country->iso2.'.json')
			)
		);
	}

    /**
     * The Region model with the given name.
     */
    protected function region(string $name): ?Region
    {
        return $region = Region::whereName($name)
            ->first();
    }
}

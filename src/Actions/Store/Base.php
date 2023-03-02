<?php

namespace JuiceCRM\GeoData\Actions\Store;

use JuiceCRM\GeoData\Exceptions\GeoDataException;
use JuiceCRM\GeoData\Models\Region;

class Base
{
	protected $jsonCountries;
	
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
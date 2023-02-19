<?php

namespace JuiceCRM\GeoData\Actions;

use JuiceCRM\GeoData\Exceptions\GeoDataException;
use JuiceCRM\GeoData\Models\Region;

class Store
{
	protected array $jsonCountries;

	/**
	 * Store the geographical data from the extracted data sources.
	 *
	 * @return void
	 */
	public function __invoke()
	{
		if(!file_exists(storage_path('app/geodata/extracts/countries-master/countries.json'))) {
			throw new GeoDataException('Data is not extracted yet.');
		}

		$this->loadJsonCountries();

		$this->storeCurrencies();
		$this->storeRegions();
	}

	/**
	 * Load the countries from the JSON file.
	 *
	 * @return void
	 */
	protected function loadJsonCountries()
	{
		$this->jsonCountries = json_decode(
			file_get_contents(storage_path('app/geodata/extracts/countries-master/countries.json')),
			true
		);
	}

	protected function storeCurrencies()
	{
		foreach($this->jsonCountries as $jsonCountry)
		{

		}
	}
	
	/**
	 * Store Region data.
	 *
	 * @return void
	 */
	protected function storeRegions()
	{
		foreach($this->jsonCountries as $jsonCountry) {
			$region = Region::firstOrCreate([
				'name' => $jsonCountry['region']
			]);
			if($jsonCountry['subregion'] !== '') {
				$subRegion = Region::firstOrCreate([
					'parent_region_id' => $region->id,
					'name' => $jsonCountry['subregion']
				]);
			}
		}
	}
}
<?php

namespace JuiceCRM\GeoData\Actions\Store;

use JuiceCRM\GeoData\Models\Country;
use JuiceCRM\GeoData\Models\Region;

class Regions extends Base
{
	/**
	 * Store Region models from the JSON file.
	 *
	 * @return void
	 */
	public function __invoke()
	{
		$this->loadJsonCountries();

		foreach ($this->jsonCountries as $jsonCountry) {
            $region = Region::firstOrCreate([
                'name' => $jsonCountry['region'],
            ]);
            if ($jsonCountry['subregion'] !== '') {
                Region::firstOrCreate([
                    'parent_region_id' => $region->id,
                    'name' => $jsonCountry['subregion'],
                ]);
            }
		}
	}
}
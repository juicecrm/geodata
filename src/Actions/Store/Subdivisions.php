<?php

namespace JuiceCRM\GeoData\Actions\Store;

use JuiceCRM\GeoData\Models\Country;
use JuiceCRM\GeoData\Models\Subdivision;

class Subdivisions extends Base
{
	/**
	 * Store Subdivision models from the JSON file.
	 *
	 * @return void
	 */
	public function __invoke()
	{
		$countries = Country::all();
		foreach($countries as $country) {
			$subdivisionJson = $this->loadJsonSubdivisions($country);
			foreach($subdivisionJson as $subdivisionKey => $subdivision) {
				Subdivision::firstOrcreate([
					'country_id' => $country->id,
					'key' => $subdivisionKey,
					'name' => $subdivision->name,
				]);
			}
		}
	}
}
<?php

namespace JuiceCRM\GeoData\Actions\Store;

use JuiceCRM\GeoData\Models\Language;

class Languages extends Base
{
	/**
	 * Store Language models from the JSON file.
	 *
	 * @return void
	 */
	public function __invoke()
	{
		$this->loadJsonLanguages();

		foreach ($this->jsonLanguages as $jsonLanguage) {
			if(strlen($jsonLanguage['alpha3-b']) === 3) {
				Language::firstOrCreate([
					'iso3-b' => $jsonLanguage['alpha3-b'],
					'name' => $jsonLanguage['English'],
				], [
					'iso2' => $jsonLanguage['alpha2'],
					'iso3-t' => $jsonLanguage['alpha3-t'],
				]);
			}
		}
	}
}
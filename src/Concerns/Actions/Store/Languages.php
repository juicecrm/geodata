<?php

namespace JuiceCRM\GeoData\Concerns\Actions\Store;

use JuiceCRM\GeoData\Models\Country;
use JuiceCRM\GeoData\Models\Language;

trait Languages
{
	public function storeLanguages(Country $country, array $jsonCountry)
	{
		if($jsonCountry && $jsonCountry['languages']) {
			foreach($jsonCountry['languages'] as $languageKey => $details) {
				$language = Language::where('iso3-b', $languageKey)
					->orWhere('iso3-t', $languageKey)
					->first();
				$country->languages()->attach($language, [
					'i18n' => strtolower($language->iso2 . '-' . $country->iso2)
				]);
			}
		}
	}
}
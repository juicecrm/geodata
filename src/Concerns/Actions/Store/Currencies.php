<?php

namespace JuiceCRM\GeoData\Concerns\Actions\Store;

use JuiceCRM\GeoData\Models\Country;
use JuiceCRM\GeoData\Models\Currency;

trait Currencies
{
	public function storeCurrencies(Country $country, array $jsonCountry)
	{
		if($jsonCountry && $jsonCountry['currencies']) {
			foreach($jsonCountry['currencies'] as $currencyIso3 => $details) {
				$currency = Currency::whereIso3($currencyIso3)->first();
				$country->currencies()->attach($currency);
			}
		}
	}
}
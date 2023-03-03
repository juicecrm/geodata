<?php

namespace JuiceCRM\GeoData\Concerns\Actions\Store;

use JuiceCRM\GeoData\Models\Country;
use JuiceCRM\GeoData\Models\Demonym;

trait Demonyms
{
	public function storeDemonyms(Country $country, array $jsonCountry)
	{
		if($jsonCountry && $jsonCountry['demonyms']) {
			$femaleDemonym = Demonym::whereFemale(true)
				->whereName($jsonCountry['demonyms']['eng']['f'])
				->first();
			$country->demonyms()
				->attach($femaleDemonym);

			$maleDemonym = Demonym::whereFemale(true)
				->whereName($jsonCountry['demonyms']['eng']['m'])
				->first();
			$country->demonyms()
				->attach($maleDemonym);
		}
	}
}
<?php

namespace JuiceCRM\GeoData\Concerns\Actions\Store;

use JuiceCRM\GeoData\Models\Country;

trait Borders
{
    public function storeBorders(Country $country, array $jsonCountry)
    {
        if ($jsonCountry && $jsonCountry['borders']) {
            foreach ($jsonCountry['borders'] as $neighborCountryIso3) {
                $neighbor = Country::whereIso3($neighborCountryIso3)->first();
                $country->neighbors()->attach($neighbor);
            }
        }
    }
}

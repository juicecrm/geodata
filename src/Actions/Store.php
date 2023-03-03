<?php

namespace JuiceCRM\GeoData\Actions;

use JuiceCRM\GeoData\Actions\Store\Countries;
use JuiceCRM\GeoData\Actions\Store\Currencies;
use JuiceCRM\GeoData\Actions\Store\Demonyms;
use JuiceCRM\GeoData\Actions\Store\Languages;
use JuiceCRM\GeoData\Actions\Store\Regions;

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
        (new Currencies)();
        (new Demonyms)();
        (new Languages)();
        (new Regions)();
        (new Countries)();	/* Must happen after storing regions */
    }
}

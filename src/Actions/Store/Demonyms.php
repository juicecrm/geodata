<?php

namespace JuiceCRM\GeoData\Actions\Store;

use JuiceCRM\GeoData\Models\Demonym;

class Demonyms extends Base
{
    /**
     * Store Demonym models from the JSON file.
     *
     * @return void
     */
    public function __invoke()
    {
        $this->loadJsonCountries();

        foreach ($this->jsonCountries as $jsonCountry) {
            Demonym::firstOrCreate([
                'female' => false,
                'name' => $jsonCountry['demonyms']['eng']['m'],
            ]);
            Demonym::firstOrCreate([
                'female' => true,
                'name' => $jsonCountry['demonyms']['eng']['f'],
            ]);
        }
    }
}

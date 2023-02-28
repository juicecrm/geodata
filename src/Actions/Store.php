<?php

namespace JuiceCRM\GeoData\Actions;

use JuiceCRM\GeoData\Exceptions\GeoDataException;
use JuiceCRM\GeoData\Models\Country;
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
        if (! file_exists(storage_path('app/geodata/extracts/countries-master/countries.json'))) {
            throw new GeoDataException('Data is not extracted yet.');
        }

        $this->loadJsonCountries();

        $this->storeCurrencies();
        $this->storeRegions();
        $this->storeCountries();
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

    /**
     * Store Country data.
     *
     * @return void
     */
    protected function storeCountries()
    {
        foreach ($this->jsonCountries as $jsonCountry) {
            if ($jsonCountry['subregion'] !== '') {
                $region = Region::whereName($jsonCountry['subregion'])
                    ->first();
            } else {
                $region = Region::whereName($jsonCountry['region'])
                    ->first();
            }

            $country = Country::firstOrCreate([
                'iso2' => $jsonCountry['cca2'],
                'iso3' => $jsonCountry['cca3'],
                'numeric' => $jsonCountry['ccn3'],
            ], [
                'region_id' => $region->id,
                'capital' => $jsonCountry['capital'][0],
                'common' => $jsonCountry['name']['common'],
                'independent' => $jsonCountry['independent'] ?? false,
                'landlocked' => $jsonCountry['landlocked'],
                'latitude' => $jsonCountry['latlng'][0],
                'longitude' => $jsonCountry['latlng'][1],
                'official' => $jsonCountry['name']['official'],
                'status' => $jsonCountry['status'],
            ]);

            /*
             * TODO Link $country with the correct countries (borders), currencies, languages, demonyms
             */
        }
    }

    /**
     * Store Currency data.
     *
     * @return void
     */
    protected function storeCurrencies()
    {
        foreach ($this->jsonCountries as $jsonCountry) {
        }
    }

    /**
     * Store Region data.
     *
     * @return void
     */
    protected function storeRegions()
    {
        foreach ($this->jsonCountries as $jsonCountry) {
            $region = null;
            $subRegion = null;

            $region = Region::firstOrCreate([
                'name' => $jsonCountry['region'],
            ]);
            if ($jsonCountry['subregion'] !== '') {
                $subRegion = Region::firstOrCreate([
                    'parent_region_id' => $region->id,
                    'name' => $jsonCountry['subregion'],
                ]);
            }
        }
    }
}

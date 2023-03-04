<?php

namespace JuiceCRM\GeoData\Actions;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use JuiceCRM\GeoData\Exceptions\GeoDataException;

class Retrieve
{
    /**
     * Retrieve the all the relevant data.
     *
     * @return void
     */
    public function __invoke()
    {
        if (! is_dir(storage_path('/app/geodata'))) {
            mkdir(storage_path('/app/geodata'));
        }
        if (! is_dir(storage_path('/app/geodata/downloads'))) {
            mkdir(storage_path('/app/geodata/downloads'));
        }
        if (! is_dir(storage_path('/app/geodata/extracts'))) {
            mkdir(storage_path('/app/geodata/extracts'));
        }

        try {
            $response = Http::connectTimeout(3)
                ->timeout(120)
                ->throw()
                ->get('https://github.com/mledoze/countries/archive/master.zip');
            file_put_contents(storage_path('app/geodata/downloads/countries-master.zip'), $response->getBody());
        } catch (ConnectionException $ce) {
            throw new GeoDataException('Failed to retrieve the data.');
        }

        try {
            $response = Http::connectTimeout(3)
                ->timeout(120)
                ->throw()
                ->get('https://github.com/antonioribeiro/world-currencies/archive/master.zip');
            file_put_contents(storage_path('app/geodata/downloads/world-currencies.zip'), $response->getBody());
        } catch (ConnectionException $ce) {
            throw new GeoDataException('Failed to retrieve the data.');
        }

        try {
            $response = Http::connectTimeout(3)
                ->timeout(120)
                ->throw()
                ->get('https://datahub.io/core/language-codes/r/language-codes-full.json');
            file_put_contents(storage_path('app/geodata/extracts/language-codes.json'), $response->getBody());
        } catch (ConnectionException $ce) {
            throw new GeoDataException('Failed to retrieve the data.');
        }
    }
}

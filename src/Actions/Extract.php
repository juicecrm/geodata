<?php

namespace JuiceCRM\GeoData\Actions;

use JuiceCRM\GeoData\Exceptions\GeoDataException;
use ZipArchive;

class Extract
{
    /**
     * Compile several lists and store them in storage/app/geodata/compiled and unlink the storage/app/geodata/downloads directory.
     *
     * @return void
     */
    public function __invoke()
    {
        if (! file_exists(storage_path('app/geodata/downloads/countries-master.zip'))) {
            throw new GeoDataException('Data is not downloaded yet.');
        }

        $this->unzipDownloadedData();

        unlink(storage_path('app/geodata/downloads/countries-master.zip'));
        unlink(storage_path('app/geodata/downloads/world-currencies.zip'));
        rmdir(storage_path('app/geodata/downloads'));
    }

    /**
     * Unzip all downloaded archives.
     *
     * @return void
     */
    protected function unzipDownloadedData()
    {
        $this->unzipCountriesMaster();
        $this->unzipWorldCurrencies();
    }

    /**
     * Unzip the countries-master.zip.
     *
     * @return void
     */
    protected function unzipCountriesMaster()
    {
        $zipArchive = new ZipArchive();
        if ($zipArchive->open(storage_path('app/geodata/downloads/countries-master.zip'))) {
            if (! $zipArchive->extractTo(storage_path('/app/geodata/extracts'))) {
                throw new GeoDataException('Could not unzip the downloaded data.');
            }
            $zipArchive->close();
        } else {
            throw new GeoDataException('Could not unzip the downloaded data.');
        }
    }

    /**
     * Unzip the countries-master.zip.
     *
     * @return void
     */
    protected function unzipWorldCurrencies()
    {
        $zipArchive = new ZipArchive();
        if ($zipArchive->open(storage_path('app/geodata/downloads/world-currencies.zip'))) {
            if (! $zipArchive->extractTo(storage_path('/app/geodata/extracts'))) {
                throw new GeoDataException('Could not unzip the downloaded data.');
            }
            $zipArchive->close();
        } else {
            throw new GeoDataException('Could not unzip the downloaded data.');
        }
    }
}

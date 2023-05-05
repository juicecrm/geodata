<?php

namespace JuiceCRM\GeoData\Tests;

use JuiceCRM\GeoData\Actions\Extract;
use JuiceCRM\GeoData\Actions\Retrieve;
use JuiceCRM\GeoData\Actions\Store;
use JuiceCRM\GeoData\Models\Country;
use JuiceCRM\GeoData\Models\Currency;
use JuiceCRM\GeoData\Models\Demonym;
use JuiceCRM\GeoData\Models\Language;
use JuiceCRM\GeoData\Models\Region;
use JuiceCRM\GeoData\Models\Subdivision;
use Orchestra\Testbench\TestCase;

class GeoDataTest extends TestCase
{
    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /** @test */
    public function itCanRetrieveTheData()
    {
        try {
            (new Retrieve)();
            $this->assertTrue(true);
        } catch(\Exception $e) {
            $this->assertEquals('good', $e->getMessage());
        }
    }

    /** @test */
    public function itCanExtractTheData()
    {
        try {
            (new Extract)();
            $this->assertTrue(true);
        } catch(\Exception $e) {
            $this->assertEquals('good', $e->getMessage());
        }
    }

    /** @test */
    public function itCanStoreTheData()
    {
        try {
            (new Store)();
            $this->assertTrue(true);
        } catch(\Exception $e) {
            $this->assertEquals('good', $e->getMessage());
        }

        $this->assertGreaterThan(0, Country::all()->count());
        $this->assertGreaterThan(0, Currency::all()->count());
        $this->assertGreaterThan(0, Demonym::all()->count());
        $this->assertGreaterThan(0, Language::all()->count());
        $this->assertGreaterThan(0, Region::all()->count());
        $this->assertGreaterThan(0, Subdivision::all()->count());
    }
}

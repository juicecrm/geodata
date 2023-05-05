<?php

namespace JuiceCRM\GeoData\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use JuiceCRM\GeoData\Actions\Extract;
use JuiceCRM\GeoData\Actions\Retrieve;
use JuiceCRM\GeoData\Actions\Store;
use JuiceCRM\GeoData\Models\Region;
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

		$region = Region::whereName('Europe')->first();
		$this->assertNotNull($region);
	}
}

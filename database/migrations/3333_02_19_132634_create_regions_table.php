<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migration.
	 */
	public function up()
	{
		Schema::create('regions', function (Blueprint $table) {
			$table->ulid('id')->primary();
			$table->foreignUlid('parent_region_id')
				->nullable();
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::table('regions', function (Blueprint $table) {
			$table->foreign('parent_region_id')
				->references('id')
				->on('regions')
				->restrictOnDelete()
				->restrictOnUpdate();
		});
	}

	/**
	 * Reverse the migration.
	 */
	public function down()
	{
		Schema::dropIfExists('regions');
	}
};
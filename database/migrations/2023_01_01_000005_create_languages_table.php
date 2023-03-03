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
        Schema::create('languages', function (Blueprint $table) {
            $table->ulid('id')->primary();
			$table->string('iso2', 2)
				->nullable();
			$table->string('iso3-b', 3);
			$table->string('iso3-t', 3)
				->nullable();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
};

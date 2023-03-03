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
        Schema::create('country_language', function (Blueprint $table) {
            $table->id();
			$table->foreignUlid('country_id');
			$table->foreignUlid('language_id');
			$table->string('i18n', 5);
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

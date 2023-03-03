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
        Schema::create('country_demonym', function (Blueprint $table) {
            $table->id();
			$table->foreignUlid('country_id');
			$table->foreignUlid('demonym_id');
        });
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        Schema::dropIfExists('country_demonym');
    }
};

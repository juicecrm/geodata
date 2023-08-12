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
        Schema::create(config('geodata.table_prefix').'country_demonym', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('country_id')
                ->references('id')
                ->on(config('geodata.table_prefix').'countries')
                ->restrictOnDelete()
                ->restrictOnUpdate();
            $table->foreignUlid('demonym_id')
                ->references('id')
                ->on(config('geodata.table_prefix').'demonyms')
                ->restrictOnDelete()
                ->restrictOnUpdate();
        });
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        Schema::dropIfExists(config('geodata.table_prefix').'country_demonym');
    }
};

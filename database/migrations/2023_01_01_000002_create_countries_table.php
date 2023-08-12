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
        Schema::create(config('geodata.table_prefix').'countries', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('region_id')
                ->nullable()
                ->references('id')
                ->on(config('geodata.table_prefix').'regions')
                ->restrictOnDelete()
                ->restrictOnUpdate();
            $table->string('capital')
                ->nullable();
            $table->string('common')
                ->nullable();
            $table->boolean('independent')
                ->default(true);
            $table->string('iso2', 2);
            $table->string('iso3', 3);
            $table->boolean('landlocked')
                ->default(true);
            $table->double('latitude')
                ->default(0.0);
            $table->double('longitude')
                ->default(0.0);
            $table->string('numeric', 3);
            $table->string('official')
                ->nullable();
            $table->string('status')
                ->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        Schema::dropIfExists(config('geodata.table_prefix').'countries');
    }
};

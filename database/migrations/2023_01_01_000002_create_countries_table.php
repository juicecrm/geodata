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
        Schema::create('countries', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('region_id')
                ->nullable();
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

        Schema::table('countries', function (Blueprint $table) {
            $table->foreign('region_id')
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

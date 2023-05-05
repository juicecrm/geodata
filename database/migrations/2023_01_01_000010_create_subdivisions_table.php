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
        Schema::create(config('geodata.table_prefix').'subdivisions', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('country_id');
            $table->foreignUlid('parent_subdivision_id')
                ->nullable();
            $table->string('key');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table(config('geodata.table_prefix').'subdivisions', function (Blueprint $table) {
            $table->foreign('country_id')
                ->references('id')
                ->on(config('geodata.table_prefix').'countries')
                ->restrictOnDelete()
                ->restrictOnUpdate();

            $table->foreign('parent_subdivision_id')
                ->references('id')
                ->on(config('geodata.table_prefix').'subdivisions')
                ->restrictOnDelete()
                ->restrictOnUpdate();
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

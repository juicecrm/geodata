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
        Schema::create(config('geodata.table_prefix').'area_codes', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('e164_country_code_id')
                ->references('id')
                ->on(config('geodata.table_prefix').'e164_country_codes')
                ->restrictOnDelete()
                ->restrictOnUpdate();
            $table->string('area_code');
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

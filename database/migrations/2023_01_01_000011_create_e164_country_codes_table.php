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
        Schema::create(config('geodata.table_prefix').'e164_country_codes', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('country_id')
                ->references('id')
                ->on(config('geodata.table_prefix').'countries')
                ->restrictOnDelete()
                ->restrictOnUpdate();
            $table->string('country_code');
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

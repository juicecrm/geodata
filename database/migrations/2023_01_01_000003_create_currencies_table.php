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
        Schema::create('currencies', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('iso3', 3);
            $table->string('major_name')->default('');
            $table->string('major_symbol')->default('');
            $table->string('minor_name')->default('');
            $table->string('minor_symbol')->default('');
            $table->double('minor_value')->default(0.0);
            $table->string('name');
            $table->string('numeric', 3);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migration.
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
};

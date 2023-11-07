<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paires', function (Blueprint $table) {
            $table->id();
            $table->string('source_currency');
            $table->string('target_currency');
            $table->decimal('rate');
            $table->integer('number_of_requests'); // Correction de 'int' à 'integer'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paires');
    }
}

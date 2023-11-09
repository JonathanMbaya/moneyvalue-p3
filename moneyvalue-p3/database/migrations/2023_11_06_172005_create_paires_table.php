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
        Schema::disableForeignKeyConstraints();
        Schema::create('paires', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('source_currency');
            $table->string('target_currency');
            $table->decimal('rate');
            $table->integer('number_of_requests'); // Correction de 'int' à 'integer'
            $table->timestamps();


            $table->foreign('source_currency')->references('code')->on('devises');
            $table->foreign('target_currency')->references('code')->on('devises');
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

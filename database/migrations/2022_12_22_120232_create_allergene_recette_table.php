<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergene_recette', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('recette_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('allergene_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergene_recette');
    }
};

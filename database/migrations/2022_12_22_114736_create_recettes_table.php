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
        Schema::create('recettes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->time('preparation');
            $table->time('rest');
            $table->string('photo')->nullable();
            $table->time('cooking');
            $table->text('ingredients');
            $table->text('steps');
            $table->boolean('patient_only')->nullable();
            $table->foreignId('statut_id')->constrained()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recettes');
    }
};

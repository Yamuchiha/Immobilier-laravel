<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranos', function (Blueprint $table) {
            $table->id();
            $table->string('Nom');
            $table->string('Adresse');
            $table->string('Categorie');
            $table->text('Description');
            $table->string('Image_Vignette');
            $table->integer('Prix');
            $table->integer('status');
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
        Schema::dropIfExists('tranos');
    }
}

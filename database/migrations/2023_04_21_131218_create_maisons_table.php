<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maisons', function (Blueprint $table) {
            $table->id();
            $table->string('maison_nom', 65)->unique();
            $table->integer('maison_prix');
            $table->string('maison_categorie');
            $table->string('maison_image');
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
        Schema::dropIfExists('maisons');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('t_commande', function (Blueprint $table) {
            $table->id('id');
			$table->string('ref');
			$table->string('nom');
			$table->string('raison_sociale');
			$table->string('nif');
			$table->string('telephone');
			$table->string('mail');
			$table->string('adresse');
			$table->string('ville');
			$table->date('date_creation');
			$table->date('date_validation')->nullable();
			$table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_models');
    }
}
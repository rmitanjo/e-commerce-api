<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
		Schema::create('t_categorie', function (Blueprint $table) {
            $table->id('id');
            $table->string('libelle');
			$table->string('description');
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
        Schema::dropIfExists('t_categorie');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
		Schema::create('t_article', function (Blueprint $table) {
            $table->id('id');
			$table->integer('id_categorie');
            $table->string('ref');
            $table->string('libelle');
            $table->float('pu');
			$table->float('ancien_pu');
			$table->integer('stock');
			$table->string('description');
			$table->string('image1');
			$table->string('image2');
			$table->string('image3');
			$table->string('image4');
			$table->timestamp('created_at', $precision = 0);
			$table->timestamp('updated_at', $precision = 0);
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
        Schema::dropIfExists('articles');
    }
}

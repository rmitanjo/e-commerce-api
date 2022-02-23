<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('r_commande_article', function (Blueprint $table) {
			$table->integer('id_article');
			$table->integer('id_commande');
			$table->integer('qte');
			$table->float('pu');
			$table->primary(['id_article', 'id_commande']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_commande_article');
    }
}

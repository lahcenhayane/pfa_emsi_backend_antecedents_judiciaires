<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalFichierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_fichier', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("description");
            $table->string("duree");
            $table->uuid("fichier_id");
            $table->uuid("criminal_id");
            $table->foreign("fichier_id")->references("id")->on("fichiers")->onDelete("cascade");
            $table->foreign("criminal_id")->references("id")->on("criminals")->onDelete("cascade");
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
        Schema::dropIfExists('criminal_fichier');
    }
}

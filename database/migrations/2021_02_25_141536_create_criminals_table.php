<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("cin")->unique();
            $table->string("nom");
            $table->string("prenom");
            $table->enum("sexe", ["Femme","Homme"]);
            $table->date("dateNaissance");
            $table->string("ville");
            $table->string("tel");
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
        Schema::dropIfExists('criminals');
    }
}

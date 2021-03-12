<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVictimeFichierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('victime_fichier', function (Blueprint $table) {
            $table->id();
            $table->uuid("fichier_id");
            $table->uuid("victime_id");
            $table->foreign("fichier_id")->references("id")->on("fichiers")->onDelete("cascade");
            $table->foreign("victime_id")->references("id")->on("victimes")->onDelete("cascade");
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
        Schema::dropIfExists('table');
    }
}

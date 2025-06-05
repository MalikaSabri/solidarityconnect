<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('administrateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complet', 100);
            $table->string('email', 100)->unique();
            $table->string('mot_de_passe');
            $table->string('telephone', 20)->nullable();
            $table->text('adresse')->nullable();
            $table->date('date_inscription');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('administrateurs');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Vêtements', 'Meubles', 'Nourriture', 'Autres']);
            $table->string('titre', 100);
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Champ pour stocker le chemin de l'image
            $table->text('localisation')->nullable();
            $table->date('date_disponible')->nullable();
            $table->time('heure_disponible')->nullable();
            $table->enum('statut', ['Disponible', 'Réservé', 'Donné'])->default('Disponible');
            $table->foreignId('id_donateur')->constrained('donateurs');
            $table->foreignId('id_association')->nullable()->constrained('associations'); // Relation avec association
            $table->timestamp('date_creation')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donations');
    }
};

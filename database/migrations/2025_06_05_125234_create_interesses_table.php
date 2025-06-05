<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('interesses', function (Blueprint $table) {
            $table->foreignId('id_association')->constrained('associations');
            $table->foreignId('id_donation')->constrained('donations');
            $table->boolean('interesse')->default(true);
            $table->timestamp('date_interet')->useCurrent();
            $table->primary(['id_association', 'id_donation']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('interesses');
    }
};

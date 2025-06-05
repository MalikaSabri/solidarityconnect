<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('don_attribues', function (Blueprint $table) {
            $table->foreignId('id_besoin')->constrained('besoins');
            $table->foreignId('id_donation')->constrained('donations');
            $table->timestamp('date_attribution')->useCurrent();
            $table->primary(['id_besoin', 'id_donation']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('don_attribues');
    }
};

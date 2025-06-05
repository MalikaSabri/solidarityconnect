<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('besoins', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 100);
            $table->text('description');
            $table->enum('status', ['Urgent', 'Normal'])->default('Normal');
            $table->foreignId('id_association')->constrained('associations');
            $table->foreignId('id_donateur')->nullable()->constrained('donateurs');
            $table->timestamp('date_creation')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('besoins');
    }
};

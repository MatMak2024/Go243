<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentor_id');
            $table->foreignId('mentee_id');
            $table->text('topic');// va nous servir a specifier le sujet ou le theme principal de la session de mentorat
            $table->string('description');
            $table->enum('status', ['Pending', 'Accepted', 'Completed', 'Conceled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};

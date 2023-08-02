<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 100);
            $table->string('especialidade', 100);
            $table->unsignedBigInteger('cidade_id')->nullable();
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medicos', function (Blueprint $table) {
            $table->dropForeign(['cidade_id']);
            $table->dropColumn('cidade_id');
        });
    }
};
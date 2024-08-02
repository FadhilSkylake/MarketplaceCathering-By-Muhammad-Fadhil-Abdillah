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
        Schema::create('list_menu', function (Blueprint $table) {
            $table->id('id_menu');
            $table->string('nama_menu', 255);
            $table->string('deskripsi_menu', 255);
            $table->string('foto_menu', 255);
            $table->string('harga_menu', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_menu');
    }
};

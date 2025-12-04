<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tempat_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tempat');
            $table->text('deskripsi');


            $table->foreignId('kategori_id')
                ->constrained('kategori_wisata')
                ->cascadeOnDelete();

            
            $table->foreignId('kota_id')
                ->constrained('kota')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tempat_wisata');
    }
};

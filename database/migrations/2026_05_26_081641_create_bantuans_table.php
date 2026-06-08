<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bantuans', function (Blueprint $table) {
            $table->id();

            $table->string('nama_bantuan');

            $table->bigInteger('total_dana');

            $table->bigInteger('dana_tersisa');

            $table->integer('kuota_penerima');

            $table->integer('jumlah_sudah_mengambil')
                  ->default(0);

            $table->enum('status', [
                'Tersedia',
                'Habis'
            ])->default('Tersedia');

            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bantuans');
    }
};
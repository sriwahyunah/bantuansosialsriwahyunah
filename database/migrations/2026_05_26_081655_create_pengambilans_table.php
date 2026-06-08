<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengambilans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('bantuan_id')
                  ->constrained('bantuans')
                  ->onDelete('cascade');

            $table->foreignId('masyarakat_id')
                  ->constrained('masyarakats')
                  ->onDelete('cascade');

            $table->bigInteger('jumlah_diterima');

            $table->date('tanggal_pengambilan');

            $table->enum('status', [
                'Sudah Diambil',
                'Belum Diambil'
            ])->default('Belum Diambil');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengambilans');
    }
};
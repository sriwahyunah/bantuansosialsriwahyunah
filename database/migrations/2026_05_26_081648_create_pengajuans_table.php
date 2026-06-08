<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('masyarakat_id')
                ->constrained('masyarakats')
                ->cascadeOnDelete();

            $table->foreignId('bantuan_id')
                ->constrained('bantuans')
                ->cascadeOnDelete();

            $table->enum('status', [
                'menunggu',
                'diterima',
                'ditolak',
                'sudah_diambil'
            ])->default('menunggu');

            $table->boolean('layak')->default(false);

            $table->timestamp('tanggal_pengajuan')->nullable();

            $table->timestamp('tanggal_disetujui')->nullable();

            $table->timestamp('tanggal_pengambilan')->nullable();

            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
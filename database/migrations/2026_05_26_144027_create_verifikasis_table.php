<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */
    public function up(): void
    {
        Schema::create('verifikasis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pengajuan_id')
                  ->constrained('pengajuans')
                  ->onDelete('cascade');

            $table->string('status');

            $table->text('catatan')->nullable();

            $table->date('tanggal_verifikasi');

            $table->timestamps();
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasis');
    }
};
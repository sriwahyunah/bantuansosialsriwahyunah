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
        Schema::create('event_bantuans', function (Blueprint $table) {

            $table->id();

            $table->string('nama_event');

            $table->text('deskripsi')->nullable();

            $table->string('lokasi');

            $table->date('tanggal_mulai');

            $table->date('tanggal_selesai')->nullable();

            $table->string('jenis_bantuan');

            $table->integer('kuota')->default(0);

            $table->integer('peserta')->default(0);

            $table->string('foto')->nullable(); // ini penting
            
            $table->enum('status', [
                'akan_datang',
                'berlangsung',
                'selesai'
            ])->default('akan_datang');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_bantuans');
    }
};

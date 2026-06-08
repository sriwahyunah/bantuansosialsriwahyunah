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
        Schema::create('penyalurans', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | RELASI
            |--------------------------------------------------------------------------
            */

            $table->foreignId('bantuan_id')
                  ->constrained('bantuans')
                  ->onDelete('cascade');

            $table->foreignId('masyarakat_id')
                  ->constrained('masyarakats')
                  ->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | DATA PENYALURAN
            |--------------------------------------------------------------------------
            */

            $table->integer('jumlah_disalurkan');

            $table->date('tanggal_penyaluran');

            $table->string('status')->default('Diproses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyalurans');
    }
};
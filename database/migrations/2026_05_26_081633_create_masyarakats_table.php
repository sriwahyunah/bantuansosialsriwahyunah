<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('masyarakats', function (Blueprint $table) {
            $table->id();

            $table->string('nik')->unique();
            $table->string('nama');

            $table->text('alamat');

            $table->string('pekerjaan');

            $table->bigInteger('gaji')->default(0);

            $table->bigInteger('total_harta')->default(0);

            $table->integer('jumlah_kendaraan')->default(0);

            $table->enum('status_rumah', [
                'Milik Sendiri',
                'Kontrak',
                'Menumpang'
            ]);

            $table->enum('status_kelayakan', [
                'Layak',
                'Tidak Layak'
            ])->default('Tidak Layak');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('masyarakats');
    }
};
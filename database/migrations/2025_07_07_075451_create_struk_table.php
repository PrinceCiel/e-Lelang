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
        Schema::create('struk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lelang');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_pemenang');
            $table->integer('total');
            $table->enum('status', ['belum dibayar', 'pending', 'berhasil', 'gagal']);
            $table->string('kode_unik')->nullable();
            $table->dateTime('tgl_trx');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struk');
    }
};

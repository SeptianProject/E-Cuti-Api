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
        Schema::create('notifikasis', function (Blueprint $table) {
            $table->id('id_notifikasi');
            $table->char('nik', 16);
            $table->foreign('nik')->references('nik')->on('data_pegawais')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pesan');
            $table->char('tgl_notifikasi');
            $table->char('jenis_notifikasi');
            $table->char('status_notifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasis');
    }
};

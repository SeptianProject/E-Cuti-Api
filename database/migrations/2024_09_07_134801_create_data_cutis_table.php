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
        Schema::create('data_cutis', function (Blueprint $table) {
            $table->id('id_cuti');
            $table->char('nik', 16);
            $table->foreign('nik')->references('nik')->on('data_pegawais')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_jabatan')->nullable()->constrained(table: 'jabatans', column: 'id_jabatan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_pegawai');
            $table->date('mulai_cuti');
            $table->date('akhir_cuti');
            $table->foreignId('id_jenis_cuti')->nullable()->constrained(table: 'data_jenis_cutis', column: 'id_jenis_cuti')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('jumlah_cuti');
            $table->integer('sisa_cuti');
            $table->string('keterangan');
            // optional
            $table->string('status_cuti')->nullable();
            $table->date('tgl_updated_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_cutis');
    }
};

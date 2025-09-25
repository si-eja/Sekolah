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
        Schema::create('scholls', function (Blueprint $table) {
            $table->id('id_profile');
            $table->string('nama', 40);
            $table->string('kepsek', 40);
            $table->string('ft_kepsek',100);
            $table->string('foto',100);
            $table->string('logo',100);
            $table->string('nspn',10);
            $table->text('alamat');
            $table->string('ft_lokasi',100);
            $table->string('kontak',13);
            $table->text('visi_misi');
            $table->year('thn_berdiri');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholls');
    }
};

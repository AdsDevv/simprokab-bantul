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
    Schema::create('pengrajins', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pengrajin');
        $table->string('jenis_kerajinan'); // Contoh: Batik, Gerabah
        $table->text('alamat');
        $table->string('kontak');
        $table->timestamps(); // Ini otomatis buat kolom created_at & updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengrajins');
    }
};

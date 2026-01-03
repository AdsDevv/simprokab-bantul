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
    Schema::create('produks', function (Blueprint $table) {
        $table->id();
        // Foreign Key ke tabel pengrajins
        // onDelete('cascade') artinya jika pengrajin dihapus, produknya ikut terhapus otomatis
        $table->foreignId('pengrajin_id')->constrained('pengrajins')->onDelete('cascade'); 
        
        $table->string('nama_produk');
        $table->decimal('harga', 10, 2); // Angka dengan 2 desimal
        $table->integer('stok');
        $table->text('deskripsi');
        $table->string('foto')->nullable(); // Boleh kosong (nullable)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};

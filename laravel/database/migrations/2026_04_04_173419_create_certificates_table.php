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
    Schema::create('certificates', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Admin yang buat
        $table->string('nomor_sertifikat')->unique();
        $table->string('nama_penerima');
        $table->string('nama_acara');
        $table->string('file_template'); // Path gambar sertifikat (misal: 'templates/sertifikat-a.jpg')
        
        // Fitur Statistik Kamu
        $table->boolean('is_downloaded')->default(false); 
        $table->timestamp('downloaded_at')->nullable();
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};

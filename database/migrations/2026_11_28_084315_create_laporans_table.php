
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('kode_tiket')->unique();

            $table->json('kategori_insiden');

            $table->date('tanggal_kejadian')->nullable();

            $table->text('lokasi')->nullable();

            $table->text('pihak_terlibat')->nullable();

            $table->text('kronologi');

            $table->string('preferensi_tindak_lanjut');

            $table->string('status')->default('draft');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};

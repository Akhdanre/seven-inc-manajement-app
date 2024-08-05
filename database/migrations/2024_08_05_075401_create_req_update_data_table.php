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
        Schema::create('req_update_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("kelas_id")->nullable(false);
            $table->unsignedBigInteger("mahasiswa_id")->nullable(false);
            $table->text("keterangan")->nullable(false);
            $table->timestamps();

            $table->foreign("kelas_id")->references("id")->on("kelas");
            $table->foreign("mahasiswa_id")->references("id")->on("mahasiswas");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('req_update_data');
    }
};

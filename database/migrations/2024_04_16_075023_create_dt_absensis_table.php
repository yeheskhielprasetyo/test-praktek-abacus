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
        Schema::create('dt_absensis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('NIP');
            $table->enum('status', [0, 1, 2, 3])->default(0);
            $table->foreign('NIP')->references('NIP')->on('dt_karyawans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_absensis');
    }
};

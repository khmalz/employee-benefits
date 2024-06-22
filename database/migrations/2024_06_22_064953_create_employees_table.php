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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('status');
            $table->date('tanggal_masuk');
            $table->integer('kesehatan')->default(5000000);
            $table->integer('pernikahan')->default(2500000);
            $table->integer('bencana')->default(5000000);
            $table->integer('kematian')->default(10000000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

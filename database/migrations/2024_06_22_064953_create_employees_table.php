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
            $table->string('nik')->unique();
            $table->foreignId('user_id')->constrained(table: 'users', indexName: 'employees_user_id_foreign')->cascadeOnDelete();
            $table->string('status');
            $table->date('tanggal_masuk');
            $table->integer('kesehatan')->default(2000000);
            $table->integer('bencana')->default(2000000);
            $table->integer('transportasi')->default(1000000);
            $table->integer('jabatan')->default(1000000);
            $table->integer('makanan')->default(1000000);
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_catalogues', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('package_name');
            $table->text('description');
            $table->integer('price');
            $table->foreignId('user_id')->on('users')->constrained()->onDelete('cascade')->references('id');
            $table->enum('status_publish', ['publish', 'draft']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_catalogues');
    }
};

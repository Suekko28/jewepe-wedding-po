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
        Schema::create('tb_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('catalogue_id');
            $table->string('email');
            $table->integer('phone_number');
            $table->integer('user_id');
            $table->date('wedding_date');
            $table->enum('status', ['requested', 'approved']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_orders');
    }
};

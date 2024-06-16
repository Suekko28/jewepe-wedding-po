<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_id');
            $table->integer('catalogue_id');
            $table->string('email');
            $table->string('phone_number');
            $table->date('wedding_date');
            $table->enum('status', ['requested', 'approved'])->default('requested');
            // $table->foreignId('user_id')->on('users')->onDelete('cascade')->references('id');
            // $table->foreignId('catalogues_id')->on('tb_catalogues')->onDelete('cascade')->references('id');
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

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
        Schema::create('brokers', function (Blueprint $table) {
            $table->id();
            $table->string('heading_1');
            $table->string('heading_2');
            $table->string('heading_3');
            $table->string('register_link');
            $table->string('review_link');
            $table->string('logo');


            // $table->string('bcategory_1')->default('no');
            // $table->string('bcategory_2')->default('no');
            // $table->string('bcategory_3')->default('no');
            // $table->string('bcategory_4')->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brokers');
    }
};

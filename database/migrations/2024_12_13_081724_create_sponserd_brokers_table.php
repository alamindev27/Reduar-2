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
        Schema::create('sponserd_brokers', function (Blueprint $table) {
            $table->id();
            $table->string('trading_desk');
            $table->string('min_deposit');
            $table->string('leverage');
            $table->string('platform');
            $table->string('logo')->default('uploads/sopn.webp');
            $table->string('review_link');
            $table->string('website_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponserd_brokers');
    }
};

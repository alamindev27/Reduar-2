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
        Schema::create('forex_bonuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('slug');
            $table->longText('short_description');
            $table->string('image');
            $table->string('link');
            $table->string('link_text');
            $table->longText('step');
            // Details

            $table->string('bonus');
            $table->string('promo_url');
            $table->string('promo_text');
            $table->string('bonus_2');
            $table->string('platform');
            $table->string('leverage');
            $table->string('regulation');
            $table->string('kyc');
            $table->string('contacts');
            $table->string('review');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forex_bonuses');
    }
};

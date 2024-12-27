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
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('award_year');
            $table->string('png');
            $table->string('psd');
            $table->string('logo');
            // $table->string('details_link');


            $table->enum('type', array('forex_broker', 'global_bank', 'global_online', 'pop_trading'));
            $table->string('title');
            $table->string('slug');
            $table->longText('short_description');
            $table->string('image');
            $table->longText('description');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awards');
    }
};

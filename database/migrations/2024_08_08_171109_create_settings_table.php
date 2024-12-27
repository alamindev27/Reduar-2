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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('author_image')->default('uploads/avatar.png');
            $table->string('site_name');
            $table->string('site_title');
            $table->string('site_logo');
            $table->string('site_favicon');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->longText('meta_keyword');
            $table->longText('focus_keyword');
            $table->string('footer_about');

            $table->string('wa_link');
            $table->string('tel_link');
            $table->string('email');
            $table->string('sk_link');
            $table->string('add_configure')->default('top');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

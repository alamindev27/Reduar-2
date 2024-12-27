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
        Schema::create('broker_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('bestForexes_id')->nullable();
            $table->unsignedBigInteger('bestForexesSubCat_id')->nullable();
            // $table->unsignedBigInteger('subcategory_id');
            $table->string('title');
            $table->string('slug');
            $table->longText('short_description');


            //
            $table->string('brokers_name');
            $table->string('trading_desk');
            $table->string('year_founded');
            $table->string('headquarters');
            $table->string('regulation');
            $table->string('us_clients');
            $table->string('support_247');
            $table->string('support_email');
            $table->string('telephone');
            $table->string('address');
            $table->string('languages');

            // Accounts Details
            $table->string('commission');
            $table->string('accounts');
            $table->string('min_deposit');
            $table->string('currencies');
            $table->string('execution');
            $table->string('leverage');
            $table->string('spreads');
            $table->string('trade_size');
            $table->string('instruments');
            $table->string('demo_trading');
            $table->string('swap_free');
            $table->string('copy_trading');
            $table->string('crypto_trading');

            // Platforms
            $table->string('platform');
            $table->string('mobile_trading');
            $table->string('web_trading');
            $table->string('affiliate');

            // Funding
            $table->longText('deposit');
            $table->longText('withdrawal');



            $table->longText('description');
            $table->string('logo');
            $table->string('review');
            $table->string('total_ratings');
            $table->string('website_link');



            $table->string('bcategory_1')->default('no');
            $table->string('bcategory_2')->default('no');
            $table->string('bcategory_3')->default('no');
            $table->string('bcategory_4')->default('no');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broker_posts');
    }
};

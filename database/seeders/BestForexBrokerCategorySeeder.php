<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BestForexBrokerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('best_forex_broker_categories')->insert([
            [
                'name' => 'Brokers Forex Brokers',
                'slug' => 'brokers-forex-brokers',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Brokers By Regulation',
                'slug' => 'brokers-by-regulation',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Brokers By Platform',
                'slug' => 'brokers-by-platform',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Brokers By Countries',
                'slug' => 'brokers-by-countries',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Best Index Trading Brokers',
                'slug' => 'best-index-trading-brokers',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Brokers Type',
                'slug' => 'brokers-type',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Other Forex Brokers',
                'slug' => 'other-forex-brokers',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}

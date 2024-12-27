<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponserdBrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sponserd_brokers')->insert([
            [
                'trading_desk' => 'STP/ENC',
                'min_deposit' => '$25',
                'leverage' => '1:1000',
                'platform' => 'MT4, MT5',
                'review_link' => 'https://www.example.com/review-link',
                'website_link' => 'https://www.example.com/broker-website',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brokers')->insert([
            [
                'heading_1' => '50+ Awards Winner',
                'heading_2' => '11 Years on Market',
                'heading_3' => '50% Deposit Bonus',
                'register_link' => 'https://www.example.com/register',
                'review_link' => 'https://www.example.com',
                'logo' => 'uploads/1731077912-logo.webp',
                'created_at' => Carbon::now()
            ],[
                'heading_1' => '1:500 Leverage',
                'heading_2' => 'Licensed & Regulated',
                'heading_3' => 'Spread From 0 Pips',
                'register_link' => 'https://www.example.com/register',
                'review_link' => 'https://www.example.com',
                'logo' => 'uploads/assetsfx_logo.webp',
                'created_at' => Carbon::now()
            ],[
                'heading_1' => 'FSCA Regulated',
                'heading_2' => 'Competitive Spread',
                'heading_3' => '1:1000 Leverage',
                'register_link' => 'https://www.example.com/register',
                'review_link' => 'https://www.example.com',
                'logo' => 'uploads/cpt-markets-logo.webp',
                'created_at' => Carbon::now()
            ],[
                'heading_1' => 'Technology Focused',
                'heading_2' => 'Regulated ECN broker',
                'heading_3' => 'No Fees on Deposits',
                'register_link' => 'https://www.example.com/register',
                'review_link' => 'https://www.example.com',
                'logo' => 'uploads/blackbull-logo.webp',
                'created_at' => Carbon::now()
            ],[
                'heading_1' => '1:1000 Leverage',
                'heading_2' => 'Licensed & Regulated',
                'heading_3' => 'Spread From 0 Pips',
                'register_link' => 'https://www.example.com/register',
                'review_link' => 'https://www.example.com',
                'logo' => 'uploads/doo_prime_logo.webp',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

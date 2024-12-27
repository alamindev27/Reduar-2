<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForexBonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('forex_bonus_categories')->insert([
            [
                'name' => 'Forex Deposit Bonus',
                'slug' => 'forex-deposit-bonus',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Forex No Deposit Bonus',
                'slug' => 'forex-no-deposit-bonus',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Forex Live Contest',
                'slug' => 'forex-live-contest',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Forex Demo Contest',
                'slug' => 'forex-demo-contest',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Forex Cashback Rebate',
                'slug' => 'forex-cashback-rebate',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Crypto Bonus Promotion',
                'slug' => 'crypto-bonus-promotion',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Forex Rewards',
                'slug' => 'forex-rewards',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Forex Welcome Bonus',
                'slug' => 'forex-welcome-bonus',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

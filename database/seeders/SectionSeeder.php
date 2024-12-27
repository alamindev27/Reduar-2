<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            [
                'name' => 'Most Resent Published',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Featured Forex Brokers',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Blog',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Forex No Deposit Bonus',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Forex Deposit Bonus',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Forex Live Content',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Forex Demo Content',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

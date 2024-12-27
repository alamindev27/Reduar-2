<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrokerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('broker_categories')->insert([
            [
                'name' => 'Top 10 Best Rated Brokers',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Top 10 Asian Brokers',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Top 10 European Brokers',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Top 10 US Brokers',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

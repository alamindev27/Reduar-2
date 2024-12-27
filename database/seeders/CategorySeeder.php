<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('broker_categories')->insert([
            [
                'category_name' => 'Forex Bonus',
                'slug' => Str::slug('Forex Bonus'),
                'created_at' => Carbon::now()
            ],[
                'category_name' => 'Brokers Review',
                'slug' => Str::slug('Brokers Review'),
                'created_at' => Carbon::now()
            ],[
                'category_name' => 'Best Forex Brokers',
                'slug' => Str::slug('Best Forex Brokers'),
                'created_at' => Carbon::now()
            ],[
                'category_name' => 'Resources',
                'slug' => Str::slug('Resources'),
                'created_at' => Carbon::now()
            ],[
                'category_name' => 'Crypto',
                'slug' => Str::slug('Crypto'),
                'created_at' => Carbon::now()
            ],[
                'category_name' => 'Forex Award',
                'slug' => Str::slug('Forex Award'),
                'created_at' => Carbon::now()
            ],[
                'category_name' => 'Others',
                'slug' => Str::slug('Others'),
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

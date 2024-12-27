<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            SectionSeeder::class,
            PageSeeder::class,
            BrokerSeeder::class,
            BrokerCategorySeeder::class,
            AdvertisementSeeder::class,
            ForexBonusSeeder::class,
            SponserdBrokerSeeder::class,
            BestForexBrokerCategorySeeder::class,
        ]);
    }
}

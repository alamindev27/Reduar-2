<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->insert([
            [
                'name' => 'Privacy Policy',
                'content' => 'Privacy Policy',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Terms of Service',
                'content' => 'Terms of Service',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Copyright Policy',
                'content' => 'Copyright Policy',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}

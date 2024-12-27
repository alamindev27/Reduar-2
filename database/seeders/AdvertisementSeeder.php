<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('advertisements')->insert([
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/1.png',
                'size' => '850x270',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/2.png',
                'size' => '850x130',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/3.png',
                'size' => '850x270',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/4.png',
                'size' => '850x130',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/5.png',
                'size' => '850x130',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/6.png',
                'size' => '850x130',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/7.png',
                'size' => '1080x1080',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/8.png',
                'size' => '1080x1700',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/9.png',
                'size' => '1080x1080',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/10.png',
                'size' => '120x600',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/11.png',
                'size' => '120x600',
                'created_at' => Carbon::now()
            ],
            [
                'link' => 'example@gmacil.com',
                'price' => 150,
                'status' => 'available',
                'image' => 'uploads/ad/12.png',
                'size' => '1080*1080',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}

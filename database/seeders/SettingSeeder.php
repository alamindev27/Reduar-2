<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'author_name' => 'author name',
                'author_image' => 'uploads/avatar.png',
                'site_name' => 'site name',
                'site_title' => 'site title',
                'site_logo' => 'uploads/default-logo.png',
                'site_favicon' => 'uploads/default-favicon.png',
                'meta_title' => 'meta title',
                'meta_description' => 'meta description',
                'meta_keyword' => 'meta keyword',
                'focus_keyword' => 'focus keyword',
                'footer_about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'wa_link' => 'https://www.wa.me/+8801318***187',
                'tel_link' => 'https://www.teligram.com/example',
                'email' => 'example@gmail.com',
                'sk_link' => 'https://www.skype.com/',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}

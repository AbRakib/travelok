<?php

namespace Database\Seeders;

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
            'title' => 'Travelok',
            'sub_title' => "Explore Glocally",
            'phone' => '+880 1711 433811',
            'email' => 'travelok.club@gmail.com',
            'address' => "H-29, R-5 Bosila Garden City, Mohammadpur, Dhaka-1207, Bangladesh",
            'logo' => "",
            'icon' => "",
            'facebook' => "https://www.facebook.com/",
            'twitter' => "https://twitter.com/",
            'youtube' => "https://www.youtube.com/",
            'linkedin' => "https://bd.linkedin.com/",
            'instagram' => "https://www.instagram.com/",
            'developer' => "www.nirviktech.com",
        ]);
    }
}

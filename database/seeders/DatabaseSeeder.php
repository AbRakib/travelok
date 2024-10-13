<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'slug' => Str::slug('admin'),
            'email' => 'admin@travelok.com',
            'phone' => '01700000000',
            'father_name' => fake()->name(),
            'birth_date' => fake()->date(),
            'nid' => fake()->numberBetween(10000000, 99999999),
            'password' => Hash::make('travelok'),
            'profession' => fake()->jobTitle(),
            'country_id' => 1,
            'division_id' => fake()->numberBetween(1,6),
            'district_id' => fake()->numberBetween(1,64),
            'marital_status' => fake()->numberBetween(1,2),
            'visited_places' => fake()->country(),
            'image' => 'admin.png',
            'is_admin' => '1',
        ]);

        $this->call([
            CountrySeeder::class,
            DistrictSeeder::class,
            DivisionSeeder::class,
            SettingSeeder::class,
        ]);
    }
}

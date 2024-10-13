<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $countries = array(
            array( 'id' => '1', 'name' => 'Bangladesh', 'slug' => 'bangladesh' ),
        );
        DB::table( 'countries' )->insert( $countries );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $divisions = array(
            array( 'id' => '1', 'country_id' => '1', 'name' => 'Chattagram', 'slug' => 'chattagram'),
            array( 'id' => '2', 'country_id' => '1', 'name' => 'Rajshahi', 'slug' => 'rajshahi'),
            array( 'id' => '3', 'country_id' => '1', 'name' => 'Khulna', 'slug' => 'khulna'),
            array( 'id' => '4', 'country_id' => '1', 'name' => 'Barisal', 'slug' => 'barisal'),
            array( 'id' => '5', 'country_id' => '1', 'name' => 'Sylhet', 'slug' => 'sylhet'),
            array( 'id' => '6', 'country_id' => '1', 'name' => 'Dhaka', 'slug' => 'dhaka'),
            array( 'id' => '7', 'country_id' => '1', 'name' => 'Rangpur', 'slug' => 'rangpur' ),
            array( 'id' => '8', 'country_id' => '1', 'name' => 'Mymensingh', 'slug' => 'nymensingh'),
        );
        DB::table( 'divisions' )->insert( $divisions );
    }
}

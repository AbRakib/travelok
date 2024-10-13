<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $districts = array(
            array( 'id' => '1', 'division_id' => '1', 'name' => 'Comilla', 'slug' => 'Comilla'),
            array( 'id' => '2', 'division_id' => '1', 'name' => 'Feni', 'slug' => 'Feni'),
            array( 'id' => '3', 'division_id' => '1', 'name' => 'Brahmanbaria', 'slug' => 'Brahmanbaria'),
            array( 'id' => '4', 'division_id' => '1', 'name' => 'Rangamati', 'slug' => 'Rangamati'),
            array( 'id' => '5', 'division_id' => '1', 'name' => 'Noakhali', 'slug' => 'Noakhali'),
            array( 'id' => '6', 'division_id' => '1', 'name' => 'Chandpur', 'slug' => 'Chandpur'),
            array( 'id' => '7', 'division_id' => '1', 'name' => 'Lakshmipur', 'slug' => 'Lakshmipur'),
            array( 'id' => '8', 'division_id' => '1', 'name' => 'Chattogram', 'slug' => 'Chattogram'),
            array( 'id' => '9', 'division_id' => '1', 'name' => 'Coxsbazar', 'slug' => 'Coxsbazar'),
            array( 'id' => '10', 'division_id' => '1', 'name' => 'Khagrachhari', 'slug' => 'Khagrachhari'),
            array( 'id' => '11', 'division_id' => '1', 'name' => 'Bandarban', 'slug' => 'Bandarban'),
            array( 'id' => '12', 'division_id' => '2', 'name' => 'Sirajganj', 'slug' => 'Sirajganj'),
            array( 'id' => '13', 'division_id' => '2', 'name' => 'Pabna', 'slug' => 'Pabna'),
            array( 'id' => '14', 'division_id' => '2', 'name' => 'Bogura', 'slug' => 'Bogura'),
            array( 'id' => '15', 'division_id' => '2', 'name' => 'Rajshahi', 'slug' => 'Rajshahi'),
            array( 'id' => '16', 'division_id' => '2', 'name' => 'Natore', 'slug' => 'Natore'),
            array( 'id' => '17', 'division_id' => '2', 'name' => 'Joypurhat', 'slug' => 'Joypurhat'),
            array( 'id' => '18', 'division_id' => '2', 'name' => 'Chapainawabganj', 'slug' => 'Chapainawabganj'),
            array( 'id' => '19', 'division_id' => '2', 'name' => 'Naogaon', 'slug' => 'Naogaon'),
            array( 'id' => '20', 'division_id' => '3', 'name' => 'Jashore', 'slug' => 'Jashore'),
            array( 'id' => '21', 'division_id' => '3', 'name' => 'Satkhira', 'slug' => 'Satkhira'),
            array( 'id' => '22', 'division_id' => '3', 'name' => 'Meherpur', 'slug' => 'Meherpur'),
            array( 'id' => '23', 'division_id' => '3', 'name' => 'Narail', 'slug' => 'Narail'),
            array( 'id' => '24', 'division_id' => '3', 'name' => 'Chuadanga', 'slug' => 'Chuadanga'),
            array( 'id' => '25', 'division_id' => '3', 'name' => 'Kushtia', 'slug' => 'Kushtia'),
            array( 'id' => '26', 'division_id' => '3', 'name' => 'Magura', 'slug' => 'Magura'),
            array( 'id' => '27', 'division_id' => '3', 'name' => 'Khulna', 'slug' => 'Khulna'),
            array( 'id' => '28', 'division_id' => '3', 'name' => 'Bagerhat', 'slug' => 'Bagerhat'),
            array( 'id' => '29', 'division_id' => '3', 'name' => 'Jhenaidah', 'slug' => 'Jhenaidah'),
            array( 'id' => '30', 'division_id' => '4', 'name' => 'Jhalakathi', 'slug' => 'Jhalakathi'),
            array( 'id' => '31', 'division_id' => '4', 'name' => 'Patuakhali', 'slug' => 'Patuakhali'),
            array( 'id' => '32', 'division_id' => '4', 'name' => 'Pirojpur', 'slug' => 'Pirojpur'),
            array( 'id' => '33', 'division_id' => '4', 'name' => 'Barisal', 'slug' => 'Barisal'),
            array( 'id' => '34', 'division_id' => '4', 'name' => 'Bhola', 'slug' => 'Bhola'),
            array( 'id' => '35', 'division_id' => '4', 'name' => 'Barguna', 'slug' => 'Barguna'),
            array( 'id' => '36', 'division_id' => '5', 'name' => 'Sylhet', 'slug' => 'Sylhet'),
            array( 'id' => '37', 'division_id' => '5', 'name' => 'Moulvibazar', 'slug' => 'Moulvibazar'),
            array( 'id' => '38', 'division_id' => '5', 'name' => 'Habiganj', 'slug' => 'Habiganj'),
            array( 'id' => '39', 'division_id' => '5', 'name' => 'Sunamganj', 'slug' => 'Sunamganj'),
            array( 'id' => '40', 'division_id' => '6', 'name' => 'Narsingdi', 'slug' => 'Narsingdi'),
            array( 'id' => '41', 'division_id' => '6', 'name' => 'Gazipur', 'slug' => 'Gazipur'),
            array( 'id' => '42', 'division_id' => '6', 'name' => 'Shariatpur', 'slug' => 'Shariatpur'),
            array( 'id' => '43', 'division_id' => '6', 'name' => 'Narayanganj', 'slug' => 'Narayanganj'),
            array( 'id' => '44', 'division_id' => '6', 'name' => 'Tangail', 'slug' => 'Tangail'),
            array( 'id' => '45', 'division_id' => '6', 'name' => 'Kishoreganj', 'slug' => 'Kishoreganj'),
            array( 'id' => '46', 'division_id' => '6', 'name' => 'Manikganj', 'slug' => 'Manikganj'),
            array( 'id' => '47', 'division_id' => '6', 'name' => 'Dhaka', 'slug' => 'Dhaka'),
            array( 'id' => '48', 'division_id' => '6', 'name' => 'Munshiganj', 'slug' => 'Munshiganj'),
            array( 'id' => '49', 'division_id' => '6', 'name' => 'Rajbari', 'slug' => 'Rajbari'),
            array( 'id' => '50', 'division_id' => '6', 'name' => 'Madaripur', 'slug' => 'Madaripur'),
            array( 'id' => '51', 'division_id' => '6', 'name' => 'Gopalganj', 'slug' => 'Gopalganj'),
            array( 'id' => '52', 'division_id' => '6', 'name' => 'Faridpur', 'slug' => 'Faridpur'),
            array( 'id' => '53', 'division_id' => '7', 'name' => 'Panchagarh', 'slug' => 'Panchagarh'),
            array( 'id' => '54', 'division_id' => '7', 'name' => 'Dinajpur', 'slug' => 'Dinajpur'),
            array( 'id' => '55', 'division_id' => '7', 'name' => 'Lalmonirhat', 'slug' => 'Lalmonirhat'),
            array( 'id' => '56', 'division_id' => '7', 'name' => 'Nilphamari', 'slug' => 'Nilphamari'),
            array( 'id' => '57', 'division_id' => '7', 'name' => 'Gaibandha', 'slug' => 'Gaibandha'),
            array( 'id' => '58', 'division_id' => '7', 'name' => 'Thakurgaon', 'slug' => 'Thakurgaon'),
            array( 'id' => '59', 'division_id' => '7', 'name' => 'Rangpur', 'slug' => 'Rangpur'),
            array( 'id' => '60', 'division_id' => '7', 'name' => 'Kurigram', 'slug' => 'Kurigram'),
            array( 'id' => '61', 'division_id' => '8', 'name' => 'Sherpur', 'slug' => 'Sherpur'),
            array( 'id' => '62', 'division_id' => '8', 'name' => 'Mymensingh', 'slug' => 'Mymensingh'),
            array( 'id' => '63', 'division_id' => '8', 'name' => 'Jamalpur', 'slug' => 'Jamalpur'),
            array( 'id' => '64', 'division_id' => '8', 'name' => 'Netrokona', 'slug' => 'Netrokona'),
        );

        DB::table( 'districts' )->insert( $districts );
    }
}

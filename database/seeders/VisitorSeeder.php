<?php
namespace Database\Seeders;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; // Use Faker for generating random data

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create an instance of Faker to generate random data
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            
            $ipAddress = $faker->ipv4;

            $month = Carbon::now()->format('F'); 

            
            $location = $faker->city . ', ' . $faker->state . ', ' . $faker->country; 

            // Use firstOrCreate to avoid duplicates based on ip_address and month
            Visitor::firstOrCreate(
                [
                    'ip_address' => $ipAddress, 
                    'month' => $month,        
                ],
                [
                    'location' => $location,    
                ]
            );
        }
    }
}


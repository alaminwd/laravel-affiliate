<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('web_contents')->insert([
            'footer' => 'This is the footer text.',
            'number' => '+1234567890',
            'email' => 'contact@example.com',
            'facebook' => 'https://facebook.com/example',
            'twitter' => 'https://twitter.com/example',
            'linkedin' => 'https://linkedin.com/in/example',
            'instagram' => 'https://instagram.com/example',
            'address' => '123 Example Street, Example City, Country',
            'contact_title' => 'Get in Touch',
            'contact_desp' => 'We are here to help you.',
            'whatsapp' => '+1234567890',
            'telegram' => 'https://t.me/example',
            'slide' => 'Slide description or path here',
        ]);
    }
}

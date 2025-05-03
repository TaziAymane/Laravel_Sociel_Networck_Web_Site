<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        
        // Create 20 fake profiles
        Profile::factory(150)->create();

        // Create specific test profile (uncomment if needed)
        // DB::table('profiles')->insert([
        //     "name" => "AHMED",
        //     "email" => "AHMED@gmail.com",
        //     "password" => Hash::make('1234AHMED'), // Hashed password
        //     "bio" => 'Engineer',
        //     "created_at" => now(),
        //     "updated_at" => now()
        // ]);
    }
}
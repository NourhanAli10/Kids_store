<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '1234567890',
            'email_verified_at' => now(), // assuming email is verified at the time of seeding
            'password' => Hash::make('123456789'),
            'status' => 'active',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'phone' => '9876543210',
            'email_verified_at' => now(), // assuming email is verified at the time of seeding
            'password' => Hash::make('123456789'),
            'status' => 'active',
            'role' => 'user',
        ]);
    }
}

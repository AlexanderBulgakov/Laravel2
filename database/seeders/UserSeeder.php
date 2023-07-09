<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'display_name' => 'Demo',
            'email' => 'demo@test.test',
            'role' => 'admin',
            'password' => Hash::make('1234567890'),
        ]);
    }
}

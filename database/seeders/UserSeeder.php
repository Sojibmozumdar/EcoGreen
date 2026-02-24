<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'              => 'Admin ',
            'email'             => 'admin@gmail.com',
            'user_type'         => 'admin',
            'password'          => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        User::create([
            'name'              => 'User ',
            'email'             => 'user@gmail.com',
            'user_type'         => 'user',
            'password'          => Hash::make('123456'),
            'email_verified_at' => now(),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    User::create([
        'name' => 'Joao Pinheiro',
        'email' => 'joao@email.com',
        'email_verified_at' => now(),
        'password' => bcrypt('2506'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    }
}

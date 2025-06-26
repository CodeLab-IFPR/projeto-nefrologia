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
        user::create(['firstName' => 'Joao', 'lastName' => 'Pinheiro', 'login' => 'Joao', 'password' => bcrypt('2506')]);
    }
}

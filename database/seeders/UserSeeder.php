<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'name'=> 'Admin',
            'email'=> 'admin@example.com',
            'role'=> 'admin',
            'password'=> Hash::make("password"),
            'email_verified_at' => now(),
          ]);

          User::create([
            'name'=> 'User',
            'email'=> 'user@example.com',
            'role'=> 'user',
            'password'=> Hash::make("password"),
            'email_verified_at' => now(),
          ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'fname' => 'Youssef',
            'lname' => 'Lhaila',
            'email' => 'yousseflhaila@gmail.com',
            'role' => 'admin',
            'phone' => '0641265128',
            'password' => Hash::make('youssef1974'),
        ]);
    }
}

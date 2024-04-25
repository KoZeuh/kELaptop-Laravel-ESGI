<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'phone' => '0123456789',
            'birthday' => '2000-01-01',
            'address' => '1 Admin Street',
            'city' => 'Admin City',
            'zip' => '12345',
            'country' => 'Admin Country',
            'email' => 'a@a.fr',
            'password' => Hash::make('password'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $randomPassword = Str::random(10);

        $user = User::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'phone' => '0123456789',
            'birthday' => '2000-01-01',
            'address' => '1 Admin Street',
            'city' => 'Admin City',
            'zip' => '12345',
            'country' => 'Admin Country',
            'email' => 'admin@kelaptop.fr',
            'password' => Hash::make($randomPassword),
        ]);

        $user->assignRole('admin');
        $user->save();

        $this->command->info('Admin user created with password: ' . $randomPassword.' and email: '.$user->email);

        $randomPassword = Str::random(10);
        $user = User::create([
            'firstname' => 'Seller',
            'lastname' => 'Seller',
            'phone' => '0123456789',
            'birthday' => '2000-01-01',
            'address' => '1 Seller Street',
            'city' => 'Seller City',
            'zip' => '12345',
            'country' => 'Seller Country',
            'email' => 'seller@kelaptop.fr',
            'password' => Hash::make($randomPassword),
        ]);

        $user->assignRole('seller');
        $user->save();

        $this->command->info('Seller user created with password: ' . $randomPassword.' and email: '.$user->email);
    }
}

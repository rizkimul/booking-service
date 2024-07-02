<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(20)->create();
        \App\Models\Field::factory(20)->create();
        \App\Models\ServiceType::factory(20)->create();
        \App\Models\Service::factory(20)->create();
        \App\Models\User::create([
            'username' => 'Admin',
            'password' => Hash::make('Admin'),
            'usertype' => 'Admin',
            'instansi' => 'Humas',
            'fullname' => 'Admin',
            'email' => 'admins@yapmail.com',
            'phone_number' => '081237017320',
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'username' => 'SuperAdmin',
            'password' => Hash::make('SuperAdmin'),
            'usertype' => 'SuperAdmin',
            'instansi' => 'Humas',
            'fullname' => 'SuperAdmin',
            'email' => 'supersadmins@yapmail.com',
            'phone_number' => '081237017320',
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'username' => 'User',
            'password' => Hash::make('User'),
            'usertype' => 'User',
            'instansi' => 'Warga',
            'fullname' => 'User',
            'email' => 'users@yapmail.com',
            'phone_number' => '081237017320',
            'remember_token' => Str::random(10),
        ]);
    }
}

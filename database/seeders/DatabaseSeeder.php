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
        \App\Models\Building::factory(20)->create();
        \App\Models\Room::factory(20)->create();
        \App\Models\RoomType::factory(20)->create();
        \App\Models\User::create([
            'username' => 'Admin',
            'password' => Hash::make('Admin'),
            'usertype' => 'Admin',
            'instansi' => 'Fakultas Teknik',
            'fullname' => 'Admin',
            'email' => 'admin@mail.com',
            'phone_number' => '089628334185',
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'username' => 'SuperAdmin',
            'password' => Hash::make('SuperAdmin'),
            'usertype' => 'SuperAdmin',
            'instansi' => 'Fakultas Teknik',
            'fullname' => 'SuperAdmin',
            'email' => 'superadmin@mail.com',
            'phone_number' => '089628334185',
            'remember_token' => Str::random(10),
        ]);
    }
}

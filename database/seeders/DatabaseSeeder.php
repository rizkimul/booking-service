<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\ServiceType;
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
        \App\Models\User::create([
            'username' => 'Admin',
            'password' => Hash::make('Admin'),
            'usertype' => 'Admin',
            'instansi' => 'Humas',
            'fullname' => 'Admin',
            'email' => 'admins@yapmail.com',
            'nik' => '1234567890',
            'phone_number' => '+6285179913194',
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'username' => 'SuperAdmin',
            'password' => Hash::make('SuperAdmin'),
            'usertype' => 'SuperAdmin',
            'instansi' => 'Humas',
            'fullname' => 'SuperAdmin',
            'email' => 'supersadmins@yapmail.com',
            'phone_number' => '+6285179913194',
            'nik' => '11111',
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'username' => 'User',
            'password' => Hash::make('User'),
            'usertype' => 'User',
            'instansi' => 'Warga',
            'fullname' => 'User',
            'email' => 'users@yapmail.com',
            'phone_number' => '+6285179913194',
            'nik' => '22222',
            'remember_token' => Str::random(10),
        ]);

        Field::create([
            'field_name' => 'Pelayanan Administratif',
            'field_description' => 'Bidang Pelayanan Administratif'
        ]);
        Field::create([
            'field_name' => 'Pelayanan Kesehatan',
            'field_description' => 'Bidang Pelayanan Kesehatan'
        ]);
        Field::create([
            'field_name' => 'Pelayanan Pendidikan',
            'field_description' => 'Bidang Pelayanan Pendidikan'
        ]);
        Field::create([
            'field_name' => 'Pelayanan Sosial',
            'field_description' => 'Bidang Pelayanan Sosial'
        ]);
        Field::create([
            'field_name' => 'Pelayanan Ekonomi',
            'field_description' => 'Bidang Pelayanan Ekonomi'
        ]);

        ServiceType::create([
            'service_type_name' => 'Pendaftaran Penduduk dan Pencatatan Sipil',
            'service_type_description' => 'Pendaftaran Penduduk dan Pencatatan Sipil'
        ]);
        ServiceType::create([
            'service_type_name' => 'Penerbitan Surat Administratif',
            'service_type_description' => 'Penerbitan Surat Administratif'
        ]);
        ServiceType::create([
            'service_type_name' => 'Pengelolaan Data dan Informasi Desa',
            'service_type_description' => 'Pengelolaan Data dan Informasi Desa'
        ]);
        ServiceType::create([
            'service_type_name' => 'Penyediaan Bantuan Sosial',
            'service_type_description' => 'Penyediaan Bantuan Sosial'
        ]);
        ServiceType::create([
            'service_type_name' => 'Penyediaan Pelatihan dan Pendampingan Untuk Usaha Produktif',
            'service_type_description' => 'Penyediaan Pelatihan dan Pendampingan Untuk Usaha Produktif'
        ]);




    }
}

<?php

namespace Database\Seeders;

use App\Models\roles;
use App\Models\supplier;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        roles::create([
            'id' => 1,
            'roles' => 'admin'
        ]);

        roles::create([
            'id' => 2,
            'roles' => 'pegawai'
        ]);

        supplier::create([
            'name' => 'cahyono',
            'no_telp' => '0823141231',
            'perusahaan' => 'Pt. Nabati',
            'alamat_perusahaan' => 'surabaya',
        ]);

       User::create([
            'name' =>'momo',
            'id_roles' => 1,
            'jk' => 'Perempuan',
            'no_telp' => '08213143123',
            'alamat' => 'Kyoto',
            'email' => 'momo@gmail.com',   
            'foto' => 'asd' ,
            'password' => bcrypt('hiraimomo'),
        ]);
       User::create([
            'name' =>'Hilzam',
            'id_roles' => 2,
            'jk' => 'Laki - Laki',
            'no_telp' => '08213143123',
            'alamat' => 'Gunung Sari Indah',
            'email' => 'hilzam@gmail.com',   
            'foto' => 'asd' ,
            'password' => bcrypt('12345678'),
        ]);
        

    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $user->assignRole('admin');

        $user = User::create([
            'name' => 'DAF',
            'email' => 'daf@gmail.com',
            'password' => bcrypt('password')
        ]);

        $user->assignRole('employee');

        $user->employee()->create([
            'nik' => 'RTS20210711',
            'status' => 'permanen',
            'tanggal_masuk' => '01-06-2021',
        ]);

        $user = User::create([
            'name' => 'RAS',
            'email' => 'ras@gmail.com',
            'password' => bcrypt('password')
        ]);

        $user->assignRole('employee');

        $user->employee()->create([
            'nik' => 'RTS2021715',
            'status' => 'permanen',
            'tanggal_masuk' => '16-05-2022',
        ]);
    }
}

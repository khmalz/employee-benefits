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
            'name' => 'AH',
            'email' => 'ah@gmail.com',
            'password' => bcrypt('password')
        ]);

        $user->assignRole('employee');

        $user->employee()->create([
            'nik' => 'RTS20210711',
            'nama' => 'AH',
            'status' => 'Permanen',
            'tanggal_masuk' => '2021-06-01',
        ]);
    }
}

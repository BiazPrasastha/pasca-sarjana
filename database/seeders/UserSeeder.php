<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => '1010101',
            'email' => 'mahasiswa@mail.com',
            'password' => bcrypt('mahasiswa'),
            'picture' => 'mahasiswa.jpeg',
            'role_id' => 1,
        ])
            ->student()
            ->create(
                [
                    'nim' => '1010101',
                    'study_program_id' => 1,
                    'name' => 'mahasiswa',
                    'semester' => 5
                ]
            );

        User::create([
            'username' => 'dosen',
            'email' => 'dosen@mail.com',
            'password' => bcrypt('dosen'),
            'picture' => 'dosen.jpeg',
            'role_id' => 2,
        ]);

        User::create([
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'picture' => 'admin.jpeg',
            'role_id' => 3,
        ]);
    }
}

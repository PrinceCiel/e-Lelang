<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// import
use DB;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        User::create(
            [
                'nama_lengkap' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('rahasia'),
                'isAdmin' => 1,
                'foto' => 'gambar.png',
            ]
        );
        User::create(
            [
                'nama_lengkap' => 'Member',
                'email' => 'member@example.com',
                'password' => bcrypt('rahasia'),
                'isAdmin' => 0,
                'foto' => 'gambar.png'
            ]
        );
    }
}

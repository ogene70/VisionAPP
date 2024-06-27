<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('users')->insert([
 'name' => 'Dupont',
 'email' => 'dupont.dupont@mma.fr',
 'admin'=>'1',
 'password' => Hash::make('12345678'),
 ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Arthur',
            'last_name' => 'Leywin',
            'email' => 'grey@mail.com',
            'role' => 'Admin',
            'gender' => 'Male',
            'password' => Hash::make('grey@mail.com')
        ]);
    }
}

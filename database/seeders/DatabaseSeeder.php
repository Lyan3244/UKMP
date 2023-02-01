<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'id'=>'1',
            'name'=>'Admin',
            'telepon'=>'0899999',
            'alamat'=>'UKMP',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('12345678'),
            'is_admin'=> true
            ]
        ]);
    }
}

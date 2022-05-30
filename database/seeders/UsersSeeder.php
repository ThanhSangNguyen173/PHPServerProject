<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
        'full_name'=>'HungNguyen',
        'username'=>'hung',
        'password'=>bcrypt('123'),
        'email'=>'nguyenduchung@gmail.com',
        'DOB'=>'1999-10-20',
        ]);
    }
}

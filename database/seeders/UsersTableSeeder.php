<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //criar usuários
        DB::table('users')->insert([
            [
                'username'=> 'marco@g.com',
                'password' => bcrypt('abc1234'),
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'username'=> 'teste@g.com',
                'password' => bcrypt('abc1234'),
                'created_at'=> date('Y-m-d H:i:s')
            ],
        ]);
    }
}

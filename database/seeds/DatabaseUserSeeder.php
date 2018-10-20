<?php

use Illuminate\Database\Seeder;

class DatabaseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'password' => bcrypt('123456'),
                'name' => 'Quản trị hệ thống',
                'email' => 'admin@gmail.com',
                'phone' => '123456789',
                'avatar' => ''
            ],
        ]);
    }
}

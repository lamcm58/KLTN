<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('matkhau123'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['username' => 'lamcm',
                'email' => 'lamcm@gmail.com',
                'password' => bcrypt('admin'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['username' => 'huync',
                'email' => 'huync@gmail.com',
                'password' => bcrypt('admin'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}

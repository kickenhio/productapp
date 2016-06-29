<?php

use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Creating admin account.
     *
     * @return void
     */
    public function run()
    {
	DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'okrolikowski@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }
}

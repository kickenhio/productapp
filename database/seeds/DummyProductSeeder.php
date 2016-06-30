<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DummyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	DB::table('products')->delete();
        DB::table('products')->insert([
            'name' => 'admin',
            'slug' => 'admin',
            'ean' => 'HHSD-123',
            'price' => 12.00,
            'currency' => 'USD',
            'created_at' => Carbon::now(),
        ]);
    }
}

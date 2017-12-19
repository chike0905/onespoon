<?php

use Illuminate\Database\Seeder;
use App\Foods;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('foods')->delete();
        Foods::create(["name" => "マー油豚骨醤油"]);
        Foods::create(["name" => "豚骨醤油"]);
        Foods::create(["name" => "味噌豚骨醤油"]);
    }
}

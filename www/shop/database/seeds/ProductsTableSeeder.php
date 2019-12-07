<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * @var int how many products should we create
     */
    protected $seedCounter = 1000;


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < $this->seedCounter; $i++) {
            DB::table('products')->insert([
                'sku'         => Str::random(10),
                'name'        => Str::random(50),
                'description' => Str::random(100),
            ]);
        }
    }
}

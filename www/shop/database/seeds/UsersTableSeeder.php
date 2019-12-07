<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * @var int how many user should we create
     */
    protected $seedCounter = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Max',
            'lastname'  => 'Mustermann',
            'email'     => 'max@gmail.com',
            'password'  => Hash::make('password'),
        ]);

        for ($i = 0; $i < $this->seedCounter; $i++) {
            DB::table('users')->insert([
                'firstname' => Str::random(10),
                'lastname'  => Str::random(10),
                'email'     => Str::random(10) . '@gmail.com',
                'password'  => Hash::make('password'),
            ]);
        }
    }
}

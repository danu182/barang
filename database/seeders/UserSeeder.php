<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    protected $user=[
        [
            'name'=>'',
            'email'=>'',
            'password'=>'',
        ],
    ];



    public function run(): void
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 50; $i++){
             // insert data ke table pegawai menggunakan Faker
    		DB::table('users')->insert([

                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>$faker->numberBetween(0, 100),

    		]);


        }


        User::insert($this->user);
    }
}

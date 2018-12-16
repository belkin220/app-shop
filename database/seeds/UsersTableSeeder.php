<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
          'name'=>'Antonio Mancilla',
          'email'=>'ixlevante21@yahoo.es',
          'password'=>bcrypt('123456'),
            'admin'=>true

        ]);
        User::create([
        	'name'=>'Asier Mancilla',
        	'email'=>'asiermanhierro@gmail.com',
        	'password'=>bcrypt('123456'),
            'admin'=>false

        ]);
         User::create([
        	'name'=>'Carmen Rovira',
        	'email'=>'lawer.top@gmail.com',
        	'password'=>bcrypt('secret'), 
            //'admin'=>false


        ]);

          User::create([
        	'name'=>'Kevin Herrero',
        	'email'=>'kevin@gmail.com',
        	'password'=>bcrypt('123456'), 
            //'admin'=>false

        ]);
    }
}

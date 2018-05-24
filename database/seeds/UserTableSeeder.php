<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = App\User::create([

        	'name' => 'Gideon King',

        	 'email' => 'king@home.com',

        	 'password' => bcrypt('password'),

        	 'admin' => 1



        	]);

        App\Profile::create([

        	'user_id' => $user->id,

        	'avatar' => 'uploads/avatars/G.jpg',

        	'about' => 'This app was developed with my team at heart PPS forever',

        	'facebook' => 'facebook.com',

        	'youtube' => 'youtube.com'


        	]);


    }
}

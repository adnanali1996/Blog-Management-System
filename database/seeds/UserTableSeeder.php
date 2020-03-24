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
        //
        $user = App\User::create([
            'name' => 'Engr Adnan Ali',
            'email' => 'adnan.qta2013@gmail.com',
            'password' => bcrypt('adnan123'),
            'admin' => 1,
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/Avatar/1.png',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mi.',
            'facebook' => 'Facebook.com/profile/3',
            'youtube' => 'Youtube/profile/3',
        ]);
    }
}
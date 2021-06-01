<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'	=> 'badu',
            'username'	=> 'admin',
            'email'	=> 'admin@gmail.com',
            'role' => '1',
            'password'	=> bcrypt('secret')
]);
    }
}

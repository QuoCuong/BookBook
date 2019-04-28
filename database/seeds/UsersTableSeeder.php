<?php

use Book\User;
use Illuminate\Database\Seeder;

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
            'email'      => 'admin@gmail.com',
            'password'   => bcrypt('adminn'),
            'first_name' => 'Admin',
            'birthday'   => '1998-02-15',
            'role_id'    => 1,
        ]);

        factory(User::class, 9)->create();
    }
}

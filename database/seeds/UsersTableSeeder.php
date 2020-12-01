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
        $user = User::create([ 
            'role_id' => '2',
            'name' => 'Admin', 
            'email' => 'admin@admin.com', 
            'password' => bcrypt('12345678'), 
        ]);

        $user->assignRole('admin');

    }
}

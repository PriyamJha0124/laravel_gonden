<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'guest',
            'guard_name' => 'web',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        DB::table('settings')->insert([
            'app_name' => 'Golden Time',
            'about' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
        ]);

        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);

    }
}

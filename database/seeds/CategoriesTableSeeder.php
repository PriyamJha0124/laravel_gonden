<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Restaurant',
        ]);
        Category::create([
            'name' => 'Entertainment',
        ]);
        Category::create([
            'name' => 'Saloon',
        ]);
        Category::create([
            'name' => 'Hotel',
        ]);
        Category::create([
            'name' => 'Travel',
        ]);
        Category::create([
            'name' => 'Game',
        ]);
        Category::create([
            'name' => 'Health',
        ]);
        Category::create([
            'name' => 'Life Style',
        ]);
        Category::create([
            'name' => 'Service',
        ]);
    }
}

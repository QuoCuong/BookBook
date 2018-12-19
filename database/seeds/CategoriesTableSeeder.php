<?php

use Book\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Sách trong nước']);
        Category::create(['name' => 'Foreign books']);
        Category::create(['name' => 'Sách học ngoại ngữ']);
    }
}
